<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\ChildUpdateRequest;
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

        $child =  $request->user()->children()->create($data);

        if($request->hasFile('childPhoto')) {

            $image = $request->file('childPhoto');
            $child->addMedia($image)->toMediaCollection('profile_images');

        }
        return Redirect::route('child.index');

    }

    public function edit(Request $request, Child $child){

        return view('child.edit',[
           'child' => $child
        ]);

    }

    public function update(ChildUpdateRequest $request, Child $child){

        $child->fill($request->validated());

        if($request->hasFile('childPhoto')) {

            $image = $child->getMedia('profile_images')->first();
            if($image){
                $image->delete();
            }

            $image = $request->file('childPhoto');
            $child->addMedia($image)->toMediaCollection('profile_images');

        }
        $child->save();

        return Redirect::route('child.edit', ['child' => $child->id])->with('status', 'record-updated');


    }

    public function destroy(Request $request, Child $child)
    {
        $child->delete();
        return Redirect::route('child.index');
    }

    public function show(Request $request,Child $child){

        return view("child.show",[
            'child'=>$child->id
        ]);
    }

}
