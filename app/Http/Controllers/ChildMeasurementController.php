<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeasurementStoreRequest;
use App\Http\Requests\MeasurementUpdateRequest;
use App\Models\Child;
use App\Models\Measurement;
use App\Models\MeasurementType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChildMeasurementController extends Controller
{
    //
    public function index(Request $request, Child $child)
    {
        $measurements = $child->measurements()->orderBy('date', 'desc')->paginate(1);

        return view('child.measurements.index', [
            'measurements' => $measurements,
            'child' => $child,
        ]);
    }

    public function create(Request $request, Child $child)
    {
        $measurementTypes = MeasurementType::all();

        //int 1,2,3
        $typeId = (int)$request->input("measurementType");
        //cel obj
        $type = null;
        $unit = null;
        if ($typeId) {
            $type = MeasurementType::find($typeId);
            $unit = $request->user()->getUnit($type->type); // length, weight, temperature, volume
        }
          //dd($type);



        return view('child.measurements.create', [
            'measurementTypes' => $measurementTypes,
            'measurementType' => $type,
            'child' => $child,
            'unit' => $unit,
            'user' => $request->user(),
        ]);
    }

    public  function store(MeasurementStoreRequest $request,Child $child){
        $data = $request->validated();
        $child->measurements()->create($data);
        return Redirect::route('child.measurements.index',['child'=>$child->id]);


    }

    public function edit(Request $request, Child $child, Measurement $measurement){
        $type = $measurement->type->type;
        $unit = $request->user()->getUnit($type);


        return view('child.measurements.edit',[
            'child' => $child,
            'measurement'=>$measurement,
            'unit' => $unit,

        ]);

    }

    public function update(MeasurementUpdateRequest $request,Child $child, Measurement $measurement){

        $data = $request->validated();
        $measurement->fill($data);
        $measurement->save();


        return Redirect::route('child.measurements.edit',['child'=>$child->id,'measurement'=>$measurement->id])->with('status', 'record-updated');


    }

    public function destroy(Request $request, Child $child, Measurement $measurement)
    {

        $child->measurements()->where('id', '=', $measurement->id)->delete();

        return Redirect::route('child.measurements.index',[
            'child'=>$child->id,
        ]);
    }

}
