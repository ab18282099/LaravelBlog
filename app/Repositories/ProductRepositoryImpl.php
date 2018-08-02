<?php

namespace App\Repositories;


use App\Models\Product;

class ProductRepositoryImpl extends GenericRepositoryImpl implements ProductRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }
}