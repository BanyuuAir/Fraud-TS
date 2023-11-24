<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Fraud extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'username', 'account_number', 'email', 'phone'];
}

