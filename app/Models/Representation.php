<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use Illuminate\Support\Carbon;


class Representation extends Model implements Feedable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id',
        'show_id',
        'when',

    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'representations';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the actual location of the representation
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the show of the representation
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }


    /**
     * Get the user in this Represetation.
     */
    public function Users()
    {
        return $this->hasMany(User::class);
    }


    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->show->title) //show a title
            ->summary($this->show->description)
            ->updated(Carbon::now())
            // ->updated($this->updated_at)  ajouter au modele et migration
            ->link(route('representation.show'), $this->id)
            ->authorName($this->id)
            ->authorEmail($this->authorEmail);
    }

    public function getFeedItems()
    {
        return Representation::all(); //que les representation du mois ds le flux
    }
}
