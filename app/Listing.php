<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Images()
    {
        return $this->hasMany('App\ListingImage');
    }
}
