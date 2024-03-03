<?php

namespace App\Http\Controllers;

use App\Models\GrowthFact;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index() {
        $items = Vaccine::query()->orderBy('age', 'asc')->paginate(6);
        return view('vaccine.index', ['items' => $items]);
    }
}
