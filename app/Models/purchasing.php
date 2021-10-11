<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchasing extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'order_product_id', 'pay_product', 'delivery_date', 'delivery_courier','warehouse_id'];
    /**
     * Get the user that owns the purchasing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
}
