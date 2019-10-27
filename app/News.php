<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //14追記
    protected $guarded = array('id');
    //14t追記
    public static $rules =array(
        'title'  => 'required',
        'body' => 'required',
    );
}
