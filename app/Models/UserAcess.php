<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAcess extends Model
{
    use HasFactory;

    protected $table = 'Users_acess';

    protected $fillable = ['last_login', 'Users_id'];

    protected $casts = [
        'last_login' => 'datetime'
    ];

    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
