<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingTheme extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
