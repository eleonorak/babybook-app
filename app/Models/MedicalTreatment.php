<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTreatment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = ['date' => 'datetime'];

    public function type(){
        return $this->belongsTo(MedicalTreatmentType::class,'medical_treatment_type_id','id');
    }

    public function vaccines() {
        return $this->belongsToMany(Vaccine::class);
    }


}
