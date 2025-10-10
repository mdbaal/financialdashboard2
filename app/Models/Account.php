<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_number',
        'balance',
        'currency',
        'user_id',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateBalance($amount, $oldAmount = 0, $fromEdit = false, $fromDelete = false)
    {
        $this->last_balance = $this->balance;

        if ($fromEdit) {
            $this->balance -= $oldAmount;
        }

        $fromDelete ? $this->balance -= $amount : $this->balance += $amount;
        $this->save();
    }
}
