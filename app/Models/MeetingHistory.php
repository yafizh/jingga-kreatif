<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
