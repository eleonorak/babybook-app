<?php

namespace App\Http\Controllers;

use App\Http\Requests\SleepPeriodStoreRequest;
use App\Http\Requests\SleepPeriodUpdateRequest;
use App\Models\Child;
use App\Models\SleepPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChildSleepPeriodController extends Controller
{
    //

    public function index(Request $request, Child $child ){
        $sleepPeriods = $child->sleep_periods()->orderBy('start','desc')->paginate(6);

        return view('child.sleep-periods.index',[
            'child' => $child,
            'sleepPeriods' =>$sleepPeriods,
        ]);
    }

    public function create(Request $request, Child $child){

        return view('child.sleep-periods.create',[
            'child'=>$child,
        ]);
    }

    public function store(SleepPeriodStoreRequest $request, Child $child){
        $data = $request->validated();

        $child->sleep_periods()->create($data);

        return Redirect::route('child.sleep-periods.index',[
            'child'=>$child->id,

        ]);
    }

    public function edit(Request $request, Child $child,SleepPeriod $sleepPeriod){
        return view('child.sleep-periods.edit',[
            'child'=>$child,
            'sleepPeriod'=>$sleepPeriod,
        ]);
    }

    public function update(SleepPeriodUpdateRequest $request, Child $child, SleepPeriod $sleepPeriod){

        $data = $request->validated();

        $sleepPeriod->fill($data);
        $sleepPeriod->save();

        return Redirect::route('child.sleep-periods.edit',[
            'child'=>$child->id,
            'sleep_period'=>$sleepPeriod->id
        ])->with('status', 'record-updated');

    }

    public function destroy(Request $request, Child $child, SleepPeriod $sleepPeriod){

        $child->sleep_periods()->where('id', '=', $sleepPeriod->id)->delete();
        return Redirect::route('child.sleep-periods.index',[
            'child'=>$child->id,

        ]);
    }
}
