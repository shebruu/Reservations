<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title', 'description', 'poster_url', 'location_id', 'bookable', 'price'];


    protected $table = 'shows';


    public $timestamps = true;


    /**
     * Get the main location of the show
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * Get the representations of this show.
     */
    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
    /**
     * Get the performances (artists in a type of collaboration) for the show
     */
    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
