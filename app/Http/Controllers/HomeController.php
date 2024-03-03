<?php

namespace App\Http\Controllers;

use App\Models\Bath;
use App\Models\DiaperChange;
use App\Models\Feeding;
use App\Models\Measurement;
use App\Models\MedicalTreatment;
use App\Models\SleepPeriod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * The index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {
        return view("home", [
                'activity' => $this->getActivityWidget($request)
            ]
        );
    }

    /**
     * Returns the activity widget data
     * @param Request $request
     * @return array
     */
    private function getActivityWidget(Request $request)
    {
        if(!Auth::check()) {
            return null;
        }

        /* @var User $user */
        $user = Auth::user();
        $cids = $user->children()->get()->pluck('id');

        if($request->has('activity')) {
            Cache::put('default_activity_'.$user->id, $request->get('activity'));
        }
        $type = Cache::get('default_activity_'.$user->id);

        switch ($type) {
            case 'diaper-changes':
                $query = DiaperChange::query();
                $query->orderBy('date', 'DESC');
                break;
            case 'baths':
                $query = Bath::query();
                $query->orderBy('date', 'DESC');
                break;
            case 'sleep-periods':
                $query = SleepPeriod::query();
                $query->orderBy('start', 'DESC');
                break;
            case 'measurements':
                $query = Measurement::query();
                $query->orderBy('date', 'DESC');
                break;
            case 'medical-treatments':
                $query = MedicalTreatment::query();
                $query->orderBy('date', 'DESC');
                break;
            default:
                $query = Feeding::query();
                $query->orderBy('date', 'DESC');
                $type  = 'feedings';
                break;
        }

        $records = $query->whereIn('child_id', $cids)->paginate(3);

        return [
            'view'    => $type,
            'records' =>  $records,
            'total'   => $records->count(),
            'types'   => [
                'baths' => 'Капење',
                'diaper-changes' => 'Пелени',
                'sleep-periods' => 'Спиење',
                'measurements' => 'Мерење',
                'medical-treatments' => 'Здравје',
                'feedings' => 'Хранење'
            ]
        ];
    }
}
