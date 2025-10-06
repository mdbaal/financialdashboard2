<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'account_id'
    ];

    public function account(): belongsTo {
        return belongsTo(Account::class);
    }
}
