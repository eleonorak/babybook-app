<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTreatment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function medical_treatment_type(){
        return $this->belongsTo(MedicalTreatmentType::class);
    }


}