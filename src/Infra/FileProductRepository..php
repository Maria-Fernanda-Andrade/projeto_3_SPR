<?php

declare(strict_types=1);

namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath){
        $this->filePath = $filePath;
        if (!file_exists($filePath)) {
            file_put_contents($filePath, '');
        }
    }

    public function save(array $product): bool
    {
        $json = json_encode($product, JSON_UNESCAPED_UNICODE);
        return file_put_contents($this->filePath, $json . PHP_EOL, FILE_APPEND) !== false;
    }

    public function findAll(): array
    {
        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $products = [];
        foreach ($lines as $line) {
            $decoded = json_decode($line, true);
            if (is_array($decoded)) {
                $products[] = $decoded;
            }
        }
        return $products;
    }
}
