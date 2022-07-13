<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\RegistrationModel;


class RegistrationController extends Controller
{
    
    public function onRegistration(Request $ob)
    {
        $firstnameVal = $ob->input('firstname');
        $lastnameVal = $ob->input('lastname');
        $usernameVal = $ob->input('username');
        $cityVal = $ob->input('city');
        $passwordVal = $ob->input('password');
        $genderVal = $ob->input('gender');

        $usernameCount = RegistrationModel::where(['username',$usernameVal])->count();

        if($usernameCount == 0)
        {
            $res = RegistrationModel::insert(['firstname'=>$firstnameVal, 'lastname'=>$lastnameVal, 'username'=>$usernameVal, 'city'=>$cityVal, 'password'=>$passwordVal, 'gender'=>$genderVal]);

            if($res == true)
            {
                return "insertion success";
            }
            {
                return "insertion faild";
            }
        }
        else
        {
            return "the username is already exist in the system";
        }

    }
}
