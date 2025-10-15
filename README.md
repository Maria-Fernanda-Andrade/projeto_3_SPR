Cadastro e Listagem de Produtos (SRP Demo)
Este projeto demonstra o Princípio da Responsabilidade Única (SRP) em PHP, implementando um
sistema simples de cadastro e listagem de produtos. Cada classe possui uma função específica,
respeitando a separação de camadas.
Requisitos

• Composer
• Servidor local (PHP embutido ou XAMPP)
• Permissão de leitura/escrita em 'storage/'

Como Executar
1. Instale as dependências: `composer install`
2. 2. Gere o autoload: `composer dump-autoload` 3.
Inicie o servidor: `php -S localhost:8000 -t public`
4. Acesse: http://http://localhost/products-srp-demo
Estrutura de Dados
Os produtos são armazenados em `storage/products.txt`, cada linha em JSON:
{"id":1,"name":"Tênis Verde","price":299.90,"description":"Modelo esportivo confortável"}
Camadas e Responsabilidades
Camada Responsabilidade
Contracts Define interfaces de repositórios
Infra Implementa persistência (FileProductRepository)
Application Contém regras de negócio e orquestração
Domain Define a entidade Product
Public Apresenta dados via HTML

Casos de Teste Manuais
Teste 1 — Cadastro de Produto
Acesse create-product.php, preencha os campos e salve. O produto deve aparecer na lista.
Teste 2 — Listagem de Produtos
Acesse products.php. Deve listar todos os produtos ou mostrar 'Nenhum produto cadastrado.'
Teste 3 — Validação de Campos
Tente cadastrar com campos vazios. Deve exibir erro e não salvar.
Teste 4 — Arquivo Inexistente

Renomeie products.txt e acesse a listagem. O sistema deve continuar funcionando.
Conceitos Aplicados
• SRP (Single Responsibility Principle)
• Injeção de Dependência
• PSR-4 Autoload
• Separação de camadas

Autor
Juliana Moreno Torres
Maria Fernnada De Andrade
