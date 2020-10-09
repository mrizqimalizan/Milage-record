<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mileage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date_drive', 'img_before','img_after','pur_destination','remarks',
    ];
}
