<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Qualification extends Model
{
    use HasFactory;
    protected $fillable = ['title','association','description','from','to','type'];
}
