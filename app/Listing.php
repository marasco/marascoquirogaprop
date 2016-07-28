<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function Images()
    {
        return $this->hasMany('App\ListingImage');
    }
}
