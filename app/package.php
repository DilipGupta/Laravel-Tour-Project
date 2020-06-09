<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    public function category()
    {
        return $this->belongsTo('App\package_categories');
    }
}
