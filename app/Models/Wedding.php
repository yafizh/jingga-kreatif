<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function newlyweds()
    {
        return $this->hasMany(Newlywed::class);
    }
}
