<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property string $name
 * @property string $product_description
 * @property float $price
 * @property Customer[] $customers
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'product_description', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers()
    {
        return $this->belongsToMany('App\Models\Customer');
    }
}
