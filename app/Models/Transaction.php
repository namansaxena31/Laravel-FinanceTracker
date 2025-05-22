<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'title',
        'type',
        'category',
        'amount',
        'date',
        'created_at',
        'description',
        'member_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
