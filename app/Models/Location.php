<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'designation', 'address', 'locality_id', 'website', 'phone'];


    protected $table = 'locations';


    public $timestamps = false;

    public function locality()
    {
        return $this->belongsTo('App\Locality');
    }

    /**
     * Get the shows in this location.
     */
    public function show()
    {
        return $this->hasMany(Show::class);
    }

    /**
     * Get the representations in this location.
     */
    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}
