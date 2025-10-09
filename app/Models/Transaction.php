<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'currency',
        'account_id',
        'custom_id',
        'date'
    ];

    public function account(): BelongsTo {
        return $this->belongsTo(Account::class);
    }
}
