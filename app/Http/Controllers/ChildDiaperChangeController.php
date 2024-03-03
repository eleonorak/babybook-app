<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaperChangeStoreRequest;
use App\Http\Requests\DiaperChangeUpdateRequest;
use App\Models\Child;
use App\Models\DiaperChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChildDiaperChangeController extends Controller
{
    //
    public function index(Request $request,Child $child){
        $diaperChanges = $child->diaper_changes()->orderBy('date','desc')->paginate(6);

        return view('child.diaper-changes.index',[
            'child' => $child,
            'diaperChanges' =>$diaperChanges,

        ]);
    }

    public function create(Request $request,Child $child){

        return view('child.diaper-changes.create',[
            'child'=>$child,
        ]);
    }

    public function store(DiaperChangeStoreRequest $request,Child $child){
        $data = $request->validated();

        $child->diaper_changes()->create($data);

        return Redirect::route('child.diaper-changes.index',[
            'child'=>$child->id,

        ]);

    }

    public function edit(Request $request,Child $child, DiaperChange $diaperChange){

        return view('child.diaper-changes.edit',[
            'child'=>$child,
            'diaperChanges'=>$diaperChange,
        ]);

    }
    public function update(DiaperChangeUpdateRequest $request,Child $child,DiaperChange $diaperChange){

        $data = $request->validated();
        $diaperChange->fill($data);
        $diaperChange->save();

        return Redirect::route('child.diaper-changes.edit',[
            'child'=>$child->id,
            'diaper_change'=>$diaperChange->id
        ])->with('status', 'record-updated');

    }

    public function destroy(Request $request, Child $child, DiaperChange $diaperChange)
    {

        $child->diaper_changes()->where('id', '=', $diaperChange->id)->delete();
        return Redirect::route('child.diaper-changes.index',[
            'child'=>$child->id,

        ]);
    }
}
