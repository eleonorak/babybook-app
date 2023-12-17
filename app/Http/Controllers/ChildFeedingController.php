<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedingStoreRequest;
use App\Http\Requests\FeedingUpdateRequest;
use App\Models\Child;
use App\Models\Feeding;
use App\Models\FeedingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChildFeedingController extends Controller
{
    //

    public function index(Request $request,Child $child){
        $feedings = $child->feedings()->orderBy('date','desc')->paginate(3);

        return view('child.feedings.index',[
            'feedings' => $feedings,
            'child'=> $child
        ]);
    }

    public function create(Request $request,Child $child){
        $feedingsTypes = FeedingType::all();

        //int 1,2,3
        $typeId = (int)$request->input("feedingType");

        //cel obj
        $type = null;
        if($typeId)
        {
            $type = FeedingType::find($typeId);
        }



        return view('child.feedings.create',[
            'child' => $child,
            'feedingsTypes' => $feedingsTypes,
            'feedingType' => $type,
            'user' => \Illuminate\Support\Facades\Auth::user(),
        ]);
    }

    public function store(FeedingStoreRequest $request, Child $child){

        $data = $request->validated();
        $data['unit_id'] = Auth::user()->volume_unit_id;

        $child->feedings()->create($data);

        return Redirect::route('child.feedings.index',['child'=>$child->id]);

    }

    public function edit(Request $request, Child $child,Feeding $feeding){

        return view('child.feedings.edit',[
            'child' => $child,
            'feeding'=>$feeding,
            'user' => \Illuminate\Support\Facades\Auth::user(),


        ]);

    }

    public function update(FeedingUpdateRequest $request,Child $child, Feeding $feeding){

        $data = $request->validated();
        $data['unit_id'] = Auth::user()->volume_unit_id;

        $thisFeeding = $child->feedings()->find($feeding->id);
        $thisFeeding->fill($data);
        $thisFeeding->save();


        return Redirect::route('child.feedings.edit',['child'=>$child->id,'feeding'=>$feeding->id])->with('status', 'record-updated');


    }

    public function destroy(Request $request, Child $child, Feeding $feeding)
    {

         $child->feedings()->where('id', '=', $feeding->id)->delete();

        return Redirect::route('child.feedings.index',[
            'child'=>$child,
        ]);
    }
}
