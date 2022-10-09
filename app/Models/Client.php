<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wedding()
    {
        return $this->hasOne(Wedding::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
