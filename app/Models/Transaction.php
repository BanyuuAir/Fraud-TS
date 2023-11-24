<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'time', 'account_number', 'amount', 'account_destination', 'channel'];

    public $timestamps = false;

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel', 'channel_code');
    }
}
