<?php

declare(strict_types=1);

namespace Andra\ProductsSrpDemo\Domain;

use Andra\ProductsSrpDemo\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    public function validate(array $data): bool
    {
        $name  = trim($data['name'] ?? '');
        $price = $data['price'] ?? null;

        if ($name === '' || strlen($name) < 2 || strlen($name) > 100) {
            return false;
        }

        if (!is_numeric($price) || (float)$price < 0) {
            return false;
        }

        return true;
    }
}
