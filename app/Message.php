<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['id','sourceuserid','name','message'];

  public function user()
  {
    return $this->hasMany(User::class);
  }
}
