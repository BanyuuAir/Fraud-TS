<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'time', 'activity'];

    public $timestamps = false;

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class, 'activity', 'activity_type');
    }
}

