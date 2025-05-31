<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the orders for the customer.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the reviews for the customer.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the customer's most recent order.
     */
    public function latestOrder()
    {
        return $this->hasOne(Order::class)->latest();
    }

    /**
     * Get the total amount spent by the customer.
     *
     * @return float
     */
    public function getTotalSpentAttribute()
    {
        return $this->orders()->sum('total_amount');
    }

    /**
     * Get the formatted total spent with currency.
     *
     * @return string
     */
    public function getFormattedTotalSpentAttribute()
    {
        return 'Rp ' . number_format($this->total_spent, 0, ',', '.');
    }
}
