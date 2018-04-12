<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = ['name', 'color'];

    protected $hidden = ['created_at', 'updated_at'];
}
