<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submitted_flag extends Model
{
    protected $fillable = [
        'user_id',
        'text',
        'challenge_id'
    ];
}
