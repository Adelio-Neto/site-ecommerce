

<?php

// Função para calcular a quantidade total de produtos no carrinho
function quantidadeTotalNoCarrinho() {
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $quantidadeTotal = 0;
        foreach ($_SESSION['carrinho'] as $produto) {
            $quantidadeTotal += $produto['quantidade'];
        }
        return $quantidadeTotal;
    }
    return 0;
}

// Função para calcular a quantidade total do dinheiro no carrinho
function quantidadeTotalDeDinheiro() {
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $quantidadeTotal = 0;
        foreach ($_SESSION['carrinho'] as $produto) {
            $quantidadeTotal += $produto['preco'] * $produto['quantidade'];
        }
        return $quantidadeTotal;
    }
    return 0;
}


 ?>


 