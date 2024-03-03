<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */



    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date'
    ];

    /**
     * List of children
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|Child[]
     */
    public function children()
    {

        return $this->belongsToMany(Child::class);

    }

    /**
     * The unit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit
     */
    public function lengthUnit()
    {
        return $this->belongsTo(Unit::class, 'length_unit_id', 'id');
    }

    /**
     * The unit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit
     */
    public function volumeUnit()
    {
        return $this->belongsTo(Unit::class, 'volume_unit_id', 'id');
    }

    /**
     * The unit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit
     */
    public function weightUnit()
    {
        return $this->belongsTo(Unit::class, 'weight_unit_id', 'id');
    }

    /**
     * The unit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Unit
     */
    public function temperatureUnit()
    {
        return $this->belongsTo(Unit::class, 'temperature_unit_id', 'id');
    }

    /**
     * The unit type
     * @param $type
     * @return Unit|\Illuminate\Database\Eloquent\Relations\BelongsTo|Unit|null
     */
    public function getUnit($type)
    {
        switch ($type) {
            case 'length':
                return $this->lengthUnit;
            case 'weight':
                return $this->weightUnit;
            case 'volume':
                return $this->volumeUnit;
            case 'temperature':
                return $this->temperatureUnit;
        }
        return null;
    }
}
