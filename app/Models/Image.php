<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=["id","name","path","category","mylike","unlike","user_id"];

   // public $timestamps=false;

    public  function User(){
        return $this->hasOne(User::class);
    }
}