<?php

namespace App\Http\Controllers\Charts;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SleepChartController extends Controller
{

    /**
     * Sleep chart controller
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {

        //dd($this->getSleepChartWidget(\request())->get());

        $groupped = $this->getSleepChartWidget($request)->get();
        $datasets = [];
        $labels   = [];

        foreach($groupped as $item) {
            if(!isset($datasets[$item->child_id])) {
                $datasets[$item->child_id] = [
                  'label' => $item->child_name,
                  'data' => [],
                ];
            }
            $labels[] = $item->date;
            $datasets[$item->child_id]['data'][] = $item->total;

        }

        return response()->json(['labels' => array_unique($labels), 'datasets' => array_values($datasets)], 200, [], JSON_PRETTY_PRINT);

    }

    /**
     * Sleep chart by days
     * @param Request $request
     * @return Builder
     */
    public function getSleepChartWidget(Request $request) {

        $filterBy   = $request->get('filterBy', 'date');
        $filterFrom = $request->get('filterFrom', null);
        $filterTo   = $request->get('filterTo', null);

        if ('time' === $filterBy) {


        } else {
            $query = DB::table('sleep_periods')
                ->select(
                    'children.id as child_id',
                    'children.name as child_name',
                    DB::raw('DATE(sleep_periods.end) as date'),
                    DB::raw('TIMESTAMPDIFF(MINUTE, sleep_periods.start, sleep_periods.end) as total')
                )
                ->join('children', 'children.id', '=', 'sleep_periods.child_id')
                ->whereIn('children.id',  Auth::user()->children->pluck('id')->toArray())
                ->groupBy(
                    'children.id',
                    DB::raw('DATE(sleep_periods.start)'),
                    DB::raw('DATE(sleep_periods.end)'),
                );
            if ($filterFrom || $filterTo) {
                $query->where(function (Builder $builder) use ($filterBy, $filterFrom, $filterTo) {
                    if ($filterFrom) {
                        $builder->where(DB::raw('DATE(sleep_periods.end)'), '>=', $filterFrom);
                    }
                    if ($filterTo) {
                        $builder->where(DB::raw('DATE(sleep_periods.end)'), '<=', $filterTo);
                    }
                });
            }
        }

        return $query;
    }

}
