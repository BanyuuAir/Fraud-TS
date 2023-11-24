<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['channel_code', 'channel_type', 'channel_desc'];

    use HasFactory;
}
