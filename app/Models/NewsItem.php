<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illumnate\Support\Carbon;

class NewsItem extends Representation implements Feedable
{

    //represente un elem du fluc 



    public function show()
    {
    }
}
