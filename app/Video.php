<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $fillable = ['id', 'title', 'link'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}