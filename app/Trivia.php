<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    protected $table = 'trivia';

   public function questions() {
        return $this->hasMany('App\Question');
    }
}
