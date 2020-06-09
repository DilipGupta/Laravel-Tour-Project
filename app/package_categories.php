<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package_categories extends Model
{
    public function packages()
    {
        return $this->hasMany('App\package','category_id');
    }
}
