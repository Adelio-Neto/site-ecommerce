<?php

 // Função para adicionar ao carrinho
 function adicionarAoCarrinho($produtoId) {
        if(!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        if(isset($_SESSION['carrinho'][$produtoId])) {
            $_SESSION['carrinho'][$produtoId]['quantidade']++;
        } 
        else{
            
            global $produtos;
            $_SESSION['carrinho'][$produtoId] = [
                "image" => $produtos[$produtoId]['image'],
                "nome" => $produtos[$produtoId]['nome'],
                "preco" => $produtos[$produtoId]['preco'],
                "quantidade" => 1
            ];
        }

        header('location:shop.php');

    }

    if(isset($_GET['adicionar'])) {
        adicionarAoCarrinho($_GET['adicionar']);
    
    }


?>