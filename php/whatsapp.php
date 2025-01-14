<?php


session_start();


// Número de telefone da empresa (use o formato internacional com o código do país)
$numeroEmpresa = "+244951873785"; 

// Função para criar a mensagem formatada para o WhatsApp
function gerarMensagemWhatsapp($nome, $email, $endereco, $carrinho) {
    $mensagem = "👤 *Nome:* $nome\n";
    $mensagem .= "📧 *Email:* $email\n";
    $mensagem .= "📍 *Endereço:* $endereco\n\n";
    $mensagem .= "🛒 *Resumo do Pedido:*\n";

    // Loop para incluir os detalhes de cada produto no carrinho
    foreach ($carrinho as $produto) {
        $mensagem .= "• *" . $produto['nome'] . "*\n";
        $mensagem .= "  Quantidade: " . $produto['quantidade'] . "\n";
        $mensagem .= "  Preço Unitário: KZ" . number_format($produto['preco'], 2) . "\n";
        $mensagem .= "  Subtotal: KZ" . number_format($produto['preco'] * $produto['quantidade'], 2) . "\n\n";
    }

    // Calcula o total geral
    $totalGeral = array_reduce($carrinho, function ($total, $produto) {
        return $total + ($produto['preco'] * $produto['quantidade']);
    }, 0);

    $mensagem .= "💰 *Total Geral:* KZ" . number_format($totalGeral, 2) . "\n";
    return $mensagem;
}

// Captura dados do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $endereco = $_POST['endereco'];

    // Verifica se o carrinho não está vazio
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $mensagem = gerarMensagemWhatsapp($nome, $email, $endereco, $_SESSION['carrinho']);
        
        // Cria o link do WhatsApp com a mensagem formatada
        $mensagemUrl = urlencode($mensagem);
        $whatsappUrl = "https://wa.me/$numeroEmpresa?text=$mensagemUrl";
        
        // Redireciona para o link do WhatsApp da empresa
        header("Location: $whatsappUrl");
        exit;
    } else {
        header("Location:../CartVazio.html");
        exit;
    }
}
?>
