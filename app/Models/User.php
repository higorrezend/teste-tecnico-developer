<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'Users';

    protected $fillable = ['name', 'email' ,'active'];

    protected $casts = [
        'active' => 'boolean'
    ];

    public $timestamps = false;
}
