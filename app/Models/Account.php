<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_number',
        'balance',
        'currency',
        'user_id'
    ];


    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function updateBalance(){
        $updatedBalance = $this->transactions()->sum('amount');
        
        $this->balance = $updatedBalance;
        $this->save();
    }
}
