<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalTreatmentStoreRequest;
use App\Http\Requests\MedicalTreatmentUpdateRequest;
use App\Models\Child;
use App\Models\MedicalTreatment;
use App\Models\MedicalTreatmentType;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChildMedicalTreatmentController extends Controller
{
    //
    public function index(Request $request, Child $child)
    {
        $medicalTreatments = $child->medical_treatments()->orderBy('date', 'desc')->paginate(1);

        return view('child.medical-treatments.index', [
            'medicalTreatments' => $medicalTreatments,
            'child' => $child,
        ]);
    }

    public function create(Request $request, Child $child)
    {
        $medicalTreatmentTypes = MedicalTreatmentType::all();

        //int 1,2,3
        $typeId = (int)$request->input("medicalTreatmentType");
        //cel obj
        $type = null;
        if ($typeId) {
            $type = MedicalTreatmentType::find($typeId);
        }
        //dd($type);

        $vaccines = [];
        if($type && $type->is_vac) {
            $vaccines = Vaccine::orderBy('age', 'ASC')->get();
        }

        return view('child.medical-treatments.create', [
            'medicalTreatmentTypes' => $medicalTreatmentTypes,
            'medicalTreatmentType' => $type,
            'vaccines' => $vaccines,
            'child' => $child,
            //'user' => $request->user(),
        ]);
    }

    public  function store(MedicalTreatmentStoreRequest $request,Child $child){
        $data = $request->validated();
        $treatment = $child->medical_treatments()->create($data);
        if($treatment->type && $treatment->type->is_vac) {
            $vaccines = $request->get('vaccines');
            $vaccines = is_array($vaccines) ? array_filter($vaccines) : [];
            $treatment->vaccines()->sync($vaccines);
        }

        return Redirect::route('child.medical-treatments.index',['child'=>$child->id]);


    }
    public function edit(Request $request, Child $child, MedicalTreatment $medicalTreatment){

        $vaccines = [];
        if($medicalTreatment->type && $medicalTreatment->type->is_vac) {
            $vaccines = Vaccine::orderBy('age', 'ASC')->get();
        }

        return view('child.medical-treatments.edit',[
            'child' => $child,
            'medicalTreatment' => $medicalTreatment,
            'vaccines' => $vaccines,
        ]);
    }

    public function update(MedicalTreatmentUpdateRequest $request,Child $child, MedicalTreatment $medicalTreatment){

        $data = $request->validated();

        $medicalTreatment->fill($data);
        $medicalTreatment->save();

        if($medicalTreatment->type && $medicalTreatment->type->is_vac) {
            $vaccines = $request->get('vaccines');
            $vaccines = is_array($vaccines) ? array_filter($vaccines) : [];
            $medicalTreatment->vaccines()->sync($vaccines);
        }

        return Redirect::route('child.medical-treatments.edit',['child'=>$child->id,'medical_treatment'=>$medicalTreatment->id])->with('status', 'record-updated');


    }

    public function destroy(Request $request, Child $child, MedicalTreatment $medicalTreatment)
    {

        $child->medical_treatments()->where('id', '=', $medicalTreatment->id)->delete();

        return Redirect::route('child.medical-treatments.index',[
            'child'=>$child->id,
        ]);
    }
}
