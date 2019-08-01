<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function form(){
        return view("form");
    }

    public function process(){
        extract($_REQUEST);
        $result=DB::table('students')->insert(
            ["name" => "$name", "mobile" =>"$mobile", "address"=>"$address"]
        );
        if($result){
            echo "Insert Success";
        }
        else{
            echo "Insert Fail";
        }
    }
}
