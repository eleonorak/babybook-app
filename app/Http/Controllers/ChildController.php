<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function create(Request $request){

        return view('child.create',[

        ]);

    }


    public function store(ChildStoreRequest $request ){


        $data = $request->validated();
        //$data['user_id'] = $request->user()->id;

        //if ($request->hasFile('childPhoto')) {
         //   $image = $request->file('childPhoto');
         //   $fileName = time() . '.' . $image->getClientOriginalExtension();
         //   $result = $image->storeAs('public/child_photos', $fileName);
          //  if(false !== $result) {
          //      $data['photo'] = $fileName;
           //}
      //  }


        $child =  $request->user()->children()->create($data);


        if($request->hasFile('childPhoto')) {

            $image = $request->file('childPhoto');
            $child->addMedia($image)->toMediaCollection('profile_images');

        }





        return Redirect::route('child.index');

    }
}
