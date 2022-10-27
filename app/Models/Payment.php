<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'date_payment'
    ];

    /**
     * mapper from id to name
     */
    public $paymentType = [
        'เงินสด',
        'โอนเงิน',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
