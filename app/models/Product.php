<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $price
 */
class Product extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = ['name', 'price'];
    protected $table = 'product';

    public function rules(): array
    {
        return [
            'name' => ['string'],
            'price' => ['float'],
        ];
    }

    public function calcPrice(int $count): float
    {
        return $this->price * $count;
    }
}