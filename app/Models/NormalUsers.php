<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class NormalUsers extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guarded = ['id'];
}