<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class getQuote extends Model
{
    protected $fillable = [
        'place','date','duration','contact_no','email'
    ]; //$fillable serves as a “white list” of attributes(column) that should be mass assignable
}
