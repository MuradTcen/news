<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $guarded = [];


    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function get_author_name()
    {
        return User::find($this->author_id)->name;
    }

    public function get_href()
    {
        //        Проблема в получении url прикрепленного файла
//        return Storage::url('/app/'.$this->attachment_file);
        return;
    }
}
