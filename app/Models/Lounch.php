<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lounch extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'type',
        'user_account_debit',
        'user_account_credit',
        'user_account_id',
        'lot',
        'description',
        'system',
    ];

    protected $table = 'lounchs';
}
