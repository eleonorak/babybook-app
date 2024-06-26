<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepPeriod extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['start' => 'datetime', 'end' => 'datetime'];

    public function child(){
        return  $this->belongsTo(Child::class, 'child_id', 'id');
    }

}
