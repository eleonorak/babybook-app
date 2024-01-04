<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildPhoto extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return url(sprintf('storage/child_galleries/%s/%s', $this->child_id, $this->path));
    }

    protected static function boot()
    {
        parent::boot();
        // TODO: remove photos on delete
    }
}
