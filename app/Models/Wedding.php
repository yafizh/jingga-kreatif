<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function newlyweds()
    {
        return $this->hasMany(Newlywed::class);
    }

    public function theme()
    {
        return $this->hasOne(Theme::class);
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
