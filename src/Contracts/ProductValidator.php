<?php

declare(strict_types=1);

namespace Andra\ProductsSrpDemo\Contracts;

interface ProductValidator
{
    public function validate(array $data): bool;
}