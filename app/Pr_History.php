<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pr_History extends Model
{
    //課題17 追記
    protected $guarded = array('id');
    protected $table = 'pr_histories';
    public static $rules = array(
        'create_id' => 'required',
        'edited_at' => 'required',
    );
}
