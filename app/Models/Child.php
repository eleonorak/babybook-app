<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function breast_feeds(){
        return $this->hasMany(BreastFeed::class);
    }
    public  function bottle_feeds(){
        return $this->hasMany(BottleFeed::class);
    }

    public function solid_feeds(){
        return $this->hasMany(SolidFeed::class);
    }

    public function diaper_changes(){
        return $this->hasMany(DiaperChange::class);
    }
    public function baths(){
        return $this->hasMany(Bath::class);
    }
}
