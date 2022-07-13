<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\RegistrationModel;

use Firebase\JWT\JWT;


class LoginController extends Controller
{
   

    public function onlogin(Request $ob)
    {
       
        $usernameVal = $ob->input('username');
        $passwordVal = $ob->input('password');

        $count = RegistrationModel::where(['username'=>$usernameVal, 'password'=>$passwordVal])->count();


        if($count == 1)
        {
            $key = env('TOKEN_KEY');
           
            $payload = array(
                "site" => "http://demo.org",
                "user" => $usernameVal,
                "iat" => time(),
                "exp" => time()+3600
            );

            $encode = JWT::encode($payload, $key);
            return $encode;
        }
        else
        {
            return "Wrong user name or password";
        }

    }
    
}
