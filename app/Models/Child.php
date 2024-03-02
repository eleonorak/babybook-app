<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    protected $appends = [
      'profile_photo'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public  function feedings(){
        return $this->hasMany(Feeding::class);
    }
    public  function sleep_periods(){
        return $this->hasMany(SleepPeriod::class);
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

    public function photos(){
        return $this->hasMany(ChildPhoto::class);
    }

    public function getProfilePhotoAttribute() {
        return $this->photo ? url('storage/'.$this->photo) : url('images/avatar.png');
    }

    public function getGallery($max) {

        $gallery = $this->photos()
            ->where('type', 'LIKE', 'month%')
            ->orderBy('id', 'ASC')
            ->get();

        $months = range(0, $max);
        $final = [];

        foreach($months as $month) {
            $photo = $gallery->where('type', '=', 'month'.$month)->first();
            $final[$month] = $photo;
        }

        return $final;
    }
}
