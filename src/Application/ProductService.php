<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    public function create(array $data): bool
    {
        if (!$this->validator->validate($data)) {
            return false;
        }

        $products = $this->repository->findAll();
        $lastId = 0;

        if (!empty($products)) {
            $last = end($products);
            $lastId = (int) ($last['id'] ?? 0);
        }

        $product = [
            'id' => $lastId + 1,
            'name' => trim($data['name']),
            'price' => (float) $data['price'],
        ];

        return $this->repository->save($product);
    }


    public function list(): array
    {
        return $this->repository->findAll();
    }
}
