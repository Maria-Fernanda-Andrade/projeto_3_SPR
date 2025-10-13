<?php

namespace App\Contracts;

interface ProductValidator
{
    public function validate(array $data): array;
}