<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;


class Representation extends Model
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
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->show->description,
            // 'updated' => $this->updated_at, 
            'link' => route('representation.show', $this->id),
            //env(URL_APP.'/representation/', $this->id)
            'authorName' => ("ebru"),
            //(admin du site, auteur des representation : vendeur des tickets) 
            'authorEmail' => ("ebru")

        ]);
    }

    public function getFeedItems()
    {
        return Representation::all();
    }
}
