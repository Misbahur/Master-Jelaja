<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthApiController extends BaseApiController
{
    //
    public function login(){
        $authheader = \request()->header('Authorization'); 
        $keyauth = substr($authheader,6);  

        $plainauth = base64_decode($keyauth); 
        // dd($plainauth);
        $tokenauth = explode(':', $plainauth); 

        $email = $tokenauth[0]; //email
        $pass = $tokenauth[1];  //password

        $data = (new User())->newQuery()
                ->where(['email' => $email])
                ->get(['id', 'nama', 'photo', 'nomer_telepon', 'nomer_ponsel', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nomor_ktp', 'status', 'created_by', 'email', 'password'])->first();

        if($data == null){ 
            return $this->out( status: 'Gagal', code:404, 
                    error: ['Pengguna tidak ditemukan'],
        );
        }else{ 
            if(Hash::check($pass, $data->password)){ 

                $data->fcm_token = hash('sha256', Str::random(10)); 
                unset($data->password); 
                $data->update();

                return $this->out( data: $data, status: 'OK', );
            }else{ 
                return $this->out( status: 'Gagal', code: 401, 
                    error: ['Anda tidak memiliki wewenang'],
                );
            }
        }
    }

    public function register(){

        // if(request('email')){
        //     return $this->out( status: 'Gagal', code: 406,
        //         error: ['Email Sudah Terdaftar'] );
        // }

        $user = new User();
        $user->nama = request('nama');
        $user->email = request('email');
        $user->roles_id = request('roles_id');
        $user->password = Hash::make(request('password'));
        $user->nomer_telepon = request('nomer_telepon');
        $user->photo = 'Tidak ada Photo';   
        $user->nomor_ktp = request('nomor_ktp');
        $user->status         = 'aktif';
        $user->created_by = 'Odete Jaya Kreatif';

        if($user->save() == true){
            //jika operasu insert berhasil
            return $this->out(data: $user, status: 'OK', code:201);
        }else{
            //jika insert data gagal
            return $this->out(status: 'Gagal', error: ['user gagal disimpan'], code:504);
        }
    }

    public function findAll(){
        $user = User::query();
        if( request()->has('q')){
            //jika ada query "q" untuk pencarian products.title
            $q = request('q');
            $user->where('users.nama', 'like', "%$q%");
        }

        $data = $user->paginate(10,
        [
            'users.*',
        ]);

        return $this->out(data:$data, status: 'OK');
    }
}
