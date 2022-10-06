<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    public function paymentHistory()
    {
        return $this->hasMany(PaymentHistory::class)->orderBy('id', 'DESC');
    }
}
