<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //課題14-5
    protected $guarded = array('id');
}
