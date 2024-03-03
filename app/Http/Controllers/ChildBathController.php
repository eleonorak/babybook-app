<?php

namespace App\Http\Controllers;

use App\Http\Requests\BathStoreRequest;
use App\Http\Requests\BathUpdateRequest;
use App\Models\Bath;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChildBathController extends Controller
{
    //
    public function index(Request $request,Child $child){
        $baths = $child->baths()->orderBy('date','desc')->paginate(6);

        return view('child.baths.index',[
            'child' => $child,
            'baths' =>$baths,

        ]);
    }

    public function create(Request $request,Child $child){

        return view('child.baths.create',[
            'child'=>$child,
        ]);
    }

    public function store(BathStoreRequest $request,Child $child){
        $data = $request->validated();

        $child->baths()->create($data);

        return Redirect::route('child.baths.index',[
            'child'=>$child,

        ]);

    }

    public function edit(Request $request,Child $child,Bath $bath){

        return view('child.baths.edit',[
            'child'=>$child,
            'bath'=>$bath,
        ]);
    }

    public function update(BathUpdateRequest $request,Child $child,Bath $bath){
        $data = $request->validated();
        $bath->fill($data);
        $bath->save();
        return Redirect::route('child.baths.edit',[
            'child'=>$child->id,
            'bath'=>$bath->id
        ])->with('status', 'record-updated');

    }
    public function destroy(Request $request, Child $child, Bath $bath)
    {

        $child->baths()->where('id', '=', $bath->id)->delete();
        return Redirect::route('child.baths.index',[
            'child'=>$child->id,

        ]);
    }
}
