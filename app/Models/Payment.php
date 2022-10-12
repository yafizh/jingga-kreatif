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

    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class)->orderBy('id', 'DESC');
    }


    public static function getPaymentByWeddingId($weddingId)
    {
        return self::where('wedding_id', $weddingId)
            ->where('is_deleted', false)
            ->get();
    }

    public static function getNeedToPayPaymentByWeddingId($weddingId)
    {
        return self::where('wedding_id', $weddingId)
            ->where('is_deleted', false)
            ->whereDoesntHave('paymentHistories', function ($query) {
                $query->where('status', true);
            })
            ->get()
            ->sum('nominal');
    }

    public static function getAlreadyPayPaymentByWeddingId($weddingId)
    {
        return self::where('wedding_id', $weddingId)
            ->where('is_deleted', false)
            ->whereHas('paymentHistories', function ($query) {
                $query->where('status', true);
            })
            ->get()
            ->sum('nominal');
    }
}
