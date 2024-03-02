<?php

namespace App\Http\Controllers;

use App\Models\GrowthFact;
use Illuminate\Http\Request;

class GrowthFactController extends Controller
{
    public function index() {
        $items = GrowthFact::query()->orderBy('number', 'asc')->limit(12)->get();
        return view('growth.index', ['items' => $items]);
    }
}
