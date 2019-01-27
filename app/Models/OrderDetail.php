<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $order_detail_id
 * @property int $order_id
 * @property string $product_description
 * @property float $price
 * @property int $quantity
 * @property Order $order
 */
class OrderDetail extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'order_detail';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'order_detail_id';

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'product_description', 'price', 'quantity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', null, 'order_id');
    }
}
