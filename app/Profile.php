<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //課題14-5
    protected $guarded = array('id');
    //課題16-1
    public static $rules =array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    //課題17追記
    public function pr_histories()
    {
        return $this->hasMany('App\Pr_History');
    }
}
