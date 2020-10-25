<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'string', 'max:190'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function username()
    {
        return 'nip';
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->role === 1){
            return redirect('/admin/dashboard');
        } else {
            return redirect('/user/dashboard');
        }
    }

    public function nip_validation(Request $req)
    {
      $nip = $req->nip;
      $user = \App\User::select('nip')->where('nip', $nip)->first();
      if ($nip == null) {
         return "Tidak Boleh Kosong!";
      }else if ($user == null) {
         return "Tidak Terdaftar!";
      }
    }
}
