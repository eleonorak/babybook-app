<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Child extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
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

    public function measurements(){
        return $this->hasMany(Measurement::class);
    }

    public function medical_treatments(){
        return $this->hasMany(MedicalTreatment::class);
    }


}
