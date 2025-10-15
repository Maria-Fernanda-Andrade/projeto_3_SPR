<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductRepository
{
    public function save(array $product): bool;
    public function findAll(): array;
}
