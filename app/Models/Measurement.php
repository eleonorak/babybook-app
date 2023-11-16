<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    public function measurement_type(){
         return $this->belongsTo(MeasurementType::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
