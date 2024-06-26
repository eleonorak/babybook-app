<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaperChange extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = ['date' => 'datetime'];

    public function child(){
        return  $this->belongsTo(Child::class, 'child_id', 'id');
    }
}
