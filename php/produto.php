
<?php


session_start();
    require_once 'Quantidade.php';
    // Lista de produtos
    $produtos = [
    ['id' => 0, "image" => "images/products/bottoms-1-min.jpg", "nome" => "Calça", "preco" => 1500.00, "tipo" => "Roupas", "descricao" => "Descrição do Produto 1"],
    ['id' => 1, "image" => "images/products/jacket-1-min.jpg", "nome" => "Casaco", "preco" => 2000.00, "tipo" => "Roupas", "descricao" => "Descrição do Produto 2"],
    ['id' => 2, "image" => "images/products/shoe-1-min.jpg", "nome" => "Botas", "preco" => 25000.00, "tipo" => "Calçados", "descricao" => "Descrição do Produto 3"],
    ['id' => 3, "image" => "images/products/sock-1-min.jpg", "nome" => "Meias", "preco" => 1500.00, "tipo" => "Acessórios", "descricao" => "Descrição do Produto 4"],
    ['id' => 4, "image" => "images/products/watch-1-min.jpg", "nome" => "Relógio", "preco" => 2000.00, "tipo" => "Acessórios", "descricao" => "Descrição do Produto 5"],
    ['id' => 5, "image" => "images/products/sweater-2-min.jpg", "nome" => "Camisola", "preco" => 25000.00, "tipo" => "Roupas", "descricao" => "Descrição do Produto 6"],
    ['id' => 6, "image" => "images/products/shoe_2.jpg", "nome" => "Tênis", "preco" => 18000.00, "tipo" => "Calçados", "descricao" => "Descrição do Produto 7"],
    ['id' => 7, "image" => "images/products/cloth_1.jpg", "nome" => "Blusa", "preco" => 8000.00, "tipo" => "Acessórios", "descricao" => "Descrição do Produto 8"],
    ['id' => 8, "image" => "images/products/watch_1.jpg", "nome" => "Relógio Preto", "preco" => 12000.00, "tipo" => "Acessórios", "descricao" => "Descrição do Produto 9"]
];


?>