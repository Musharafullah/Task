<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'attende1_email',
        'attende2_email',
        'subject',
        'datetime',
    ];
}
