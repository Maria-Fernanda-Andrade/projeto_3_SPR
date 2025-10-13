<?php

namespace App\Contracts;

interface ProductRepository
{
    public function save(array $product): void;
    public function findAll(): array;
}
