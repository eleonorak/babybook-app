<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function unit(){
       return  $this->belongsTo(Unit::class);
    }

    public function type(){
      return  $this->belongsTo(FeedingType::class, 'feeding_type_id', 'id');
    }
}