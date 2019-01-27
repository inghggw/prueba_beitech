<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $customer_id
 * @property string $name
 * @property string $email
 * @property Product[] $products
 * @property Order[] $orders
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'customer_id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', null, 'customer_id');
    }
}
