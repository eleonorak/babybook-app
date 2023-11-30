<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    //

    public  function index(){

        $user = Auth::user();
        $children = $user->children;
        return view('child.index',[
            'children' =>  $children,
        ]);
    }
}
