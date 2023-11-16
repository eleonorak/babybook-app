<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTreatmentType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps =  false;
}
