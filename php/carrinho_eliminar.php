<?php

session_start();

require_once 'Quantidade.php';
    // Verificar se o carrinho existe
    if(!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
   
    }

// Função para remover produto
if (isset($_GET['action']) && $_GET['action'] == 'remover' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar se o produto existe no carrinho
    if (isset($_SESSION['carrinho'][$id])) {
        unset($_SESSION['carrinho'][$id]); // Remove o produto do carrinho
    }

    // Redireciona de volta ao carrinho para atualizar a exibição
  
}

// Verificar se o carrinho existe e não está vazio
if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {

}




// Verifique se o carrinho existe
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Função para atualizar quantidade
function atualizarQuantidade($id, $acao) {
    if (isset($_SESSION['carrinho'][$id])) {
        if ($acao === 'increase') {
            $_SESSION['carrinho'][$id]['quantidade']++;
        } elseif ($acao === 'decrease' && $_SESSION['carrinho'][$id]['quantidade'] > 1) {
            $_SESSION['carrinho'][$id]['quantidade']--;
        }
    }
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['product_id'];
    $acao = $_POST['action'];

    // Atualizar quantidade de acordo com a ação
    atualizarQuantidade($id, $acao);

    // Redirecionar de volta ao carrinho após atualização
    header('Location: cart.php');
    exit;
}

// Verificar se o usuário quer remover um produto
if (isset($_GET['action']) && $_GET['action'] === 'remover') {
    $id = $_GET['id'];
    unset($_SESSION['carrinho'][$id]);
    header('Location: cart.php');
    exit;
}