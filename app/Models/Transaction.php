<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['food_id', 'user_id', 'quantity', 'total', 'status', 'payment_url'];

    /**
     * Get the food associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function food()
    {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }

    /**
     * Get the user associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
