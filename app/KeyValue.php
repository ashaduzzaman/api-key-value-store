<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    protected $table = 'key_values';
    protected $fillable = ['key', 'value'];
}
