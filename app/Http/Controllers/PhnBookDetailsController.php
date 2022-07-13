<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PhnBookDetailsModel;


use Firebase\JWT\JWT;

class PhnBookDetailsController extends Controller
{




    public function oninsert(Request $ob)
    {
        $key = env('TOKEN_KEY');
        $incoded = $ob->input('access_token');
        $decoded = JWT::decode($incoded, $key, array('HS256'));
        $arr = (array)$decoded;

        $userNameVal = $arr['user'];
        $phoneNoOneVal = $ob->input('phn_number_one');
        $phoneNoTwoVal = $ob->input('phn_number_two');
        $nameVal = $ob->input('name');
        $emailVal = $ob->input('email');

        $res = PhnBookDetailsModel::insert(['user_name'=>$userNameVal, 'phn_number_one'=>$phoneNoOneVal, 'phn_number_two'=>$phoneNoTwoVal, 'name'=>$nameVal, 'email'=>$emailVal]);

        if($res==true)
        {
            return "insertion success";
        }
        else{
            return "insertion failed";
        }
    }






    public function onselect()
    {
        return PhnBookDetailsModel::all();
    }


    public function ondelete(Request $ob)
    {
        $idVal = $ob->input('id');
        $res = PhnBookDetailsModel::where('id',$idVal)->delete();

        if($res==true)
        {
            return "data deletion success";
        }
        else{
            return "data deletion failed";
        }
    }




    
}
