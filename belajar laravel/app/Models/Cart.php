<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'session_id',
        'product_id',
        'quantity',
        'price',
        'spice_level',
        'special_instructions'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'spice_level' => 'integer',
    ];

    /**
     * Get the customer that owns the cart item.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the product that owns the cart item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the subtotal for this cart item.
     *
     * @return float
     */
    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    /**
     * Get the formatted subtotal with currency.
     *
     * @return string
     */
    public function getFormattedSubtotalAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }

    /**
     * Get the spice level as text.
     *
     * @return string
     */
    public function getSpiceLevelTextAttribute()
    {
        $levels = [
            1 => 'Tidak Pedas',
            2 => 'Sedikit Pedas',
            3 => 'Pedas Sedang',
            4 => 'Pedas',
            5 => 'Sangat Pedas'
        ];

        return $levels[$this->spice_level] ?? 'Tidak Diketahui';
    }
}
