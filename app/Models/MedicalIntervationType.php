<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalIntervationType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps =  false;
}
