<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildFeedingController extends Controller
{
    //

    public function index(Request $request,Child $child){
       // $feeds = $child->bottle_feeds()->find(1);
        return view('child.feedings.index',[
        ]);
    }
}
