<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    protected $fillable = ['activity_type', 'activity_desc'];

    use HasFactory;
}
