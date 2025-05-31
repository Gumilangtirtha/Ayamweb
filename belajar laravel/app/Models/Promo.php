<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'description',
        'discount_percent',
        'discount_amount',
        'min_order_amount',
        'start_date',
        'end_date',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'discount_percent' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'min_order_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Get the orders that use this promo.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Scope a query to only include active promos.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    /**
     * Check if the promo is valid for the given amount.
     *
     * @param float $amount
     * @return bool
     */
    public function isValidForAmount($amount)
    {
        return $amount >= $this->min_order_amount;
    }

    /**
     * Calculate the discount for the given amount.
     *
     * @param float $amount
     * @return float
     */
    public function calculateDiscount($amount)
    {
        if (!$this->isValidForAmount($amount)) {
            return 0;
        }

        if ($this->discount_amount > 0) {
            return $this->discount_amount;
        }

        if ($this->discount_percent > 0) {
            return $amount * ($this->discount_percent / 100);
        }

        return 0;
    }

    /**
     * Get the formatted discount amount with currency.
     *
     * @return string
     */
    public function getFormattedDiscountAmountAttribute()
    {
        if ($this->discount_amount > 0) {
            return 'Rp ' . number_format($this->discount_amount, 0, ',', '.');
        }
        
        return '';
    }

    /**
     * Get the formatted discount percent.
     *
     * @return string
     */
    public function getFormattedDiscountPercentAttribute()
    {
        if ($this->discount_percent > 0) {
            return $this->discount_percent . '%';
        }
        
        return '';
    }

    /**
     * Get the formatted minimum order amount with currency.
     *
     * @return string
     */
    public function getFormattedMinOrderAmountAttribute()
    {
        return 'Rp ' . number_format($this->min_order_amount, 0, ',', '.');
    }

    /**
     * Get the status badge HTML.
     *
     * @return string
     */
    public function getStatusBadgeAttribute()
    {
        if (!$this->is_active) {
            return '<span class="badge bg-danger">Tidak Aktif</span>';
        }

        $now = now();
        
        if ($now->lt($this->start_date)) {
            return '<span class="badge bg-info">Akan Datang</span>';
        }
        
        if ($now->gt($this->end_date)) {
            return '<span class="badge bg-secondary">Kadaluarsa</span>';
        }
        
        return '<span class="badge bg-success">Aktif</span>';
    }
}
