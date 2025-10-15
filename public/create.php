<?php
declare(strict_types=1);

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Domain\SimpleProductValidator;
use App\Infra\FileProductRepository;

$storagePath = __DIR__ . '/../storage/products.txt';

if (!is_dir(dirname($storagePath))) {
    mkdir(dirname($storagePath), 0777, true);
}

$repository = new FileProductRepository($storagePath);
$validator  = new SimpleProductValidator();
$service    = new ProductService($repository, $validator);

$data = [
    'name'  => trim($_POST['name'] ?? ''),
    'price' => trim($_POST['price'] ?? ''),
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ok = $service->create($data);

    if ($ok) {
        echo "<p style='color:green;'>Produto cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar produto. Verifique os dados.</p>";
    }
} else {
    echo "<p style='color:orange;'> A requisição não foi enviada via POST.</p>";
}

echo '<p><a href="index.php">⬅️ Voltar ao formulário</a> | <a href="products.php">📋 Ver produtos</a></p>';
