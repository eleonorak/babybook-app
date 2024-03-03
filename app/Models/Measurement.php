<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    protected $casts = ['date' => 'datetime'];

    public function type(){
        return  $this->belongsTo(MeasurementType::class, 'measurement_type_id', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function child(){
        return  $this->belongsTo(Child::class, 'child_id', 'id');
    }
}
