<?php

namespace App\Http\Controllers;

use App\Models\Bath;
use App\Models\ChildPhoto;
use App\Models\DiaperChange;
use App\Models\Feeding;
use App\Models\Measurement;
use App\Models\MedicalTreatment;
use App\Models\SleepPeriod;
use App\Models\User;
use App\Models\Vaccine;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * The index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {


        return view("home", [
                'activity' => $this->getActivityWidget($request),
                'sleepChart' => $this->getSleepChartData($request),
                'vaccines' => $this->getVaccinesData($request),
                'gallery' => $this->getGalleryData($request),
            ]
        );
    }

    /**
     * Sleep chart widget endpoint
     * @param Request $request
     * @return array
     */
    public function getSleepChartData(Request $request) {

        $user = Auth::user();

        if($request->has('sleep-chart-period')) {
            Cache::put('default_sleep_chart_periods_'.$user->id, $request->get('sleep-chart-period'));
        }
        $period = Cache::get('default_sleep_chart_periods_'.$user->id);

        $periods = [];
        $now = Carbon::now();
        for($i = 1; $i <= 24; $i++) {
            $start = $now->toImmutable()->startOfWeek()->format('Y-m-d');
            $end = $now->toImmutable()->endOfWeek()->format('Y-m-d');
            $periods[sprintf('%s~%s', $start, $end)] = [
                'start' => $start,
                'end' => $end,
            ];
            $now->startOfWeek()->subWeek();
        }

        $period = $period ? $period : array_key_first($periods);

        return [
            'period' => $period,
            'periods' => $periods,
        ];

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

    /**
     * The vaccines data
     * @param Request $request
     * @return array
     */
    public function getVaccinesData(Request $request) {

        $vaccines = Vaccine::orderBy('age', 'ASC')->get();
        $children = \auth()->user()->children;

        return [
            'vaccines' => $vaccines,
            'children' => $children,
        ];

    }

    /**
     * The gallery data
     * @param Request $request
     * @return array
     */
    public function getGalleryData(Request $request) {
        $childrenIds = Auth::user()->children->map(function($item){
            return $item->id;
        });

        $gallery = ChildPhoto::query()
                        ->whereIn('child_id', $childrenIds)
                        ->orderBy('created_at', 'desc')
                        ->limit(10)
                        ->get();

        return [
            'photos' => $gallery
        ];

    }
}
