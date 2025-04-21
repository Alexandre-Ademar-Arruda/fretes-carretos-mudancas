<?php
require_once 'config.php';
require_once 'assear_dados.php';
require_once 'verifica_vazio.php';
require_once 'inserir_orcamento.php';


try {
    //aqui criamos $conn que obtem a conexão com o db
    $conn = get_config();
    //aqui vericamos se o formulario foi enviado via POST
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        //aqui requisitamos limpa_nome() funçao que está no arquivo 'assear_dados.php'
        //limpa_nome() limpa os espaços em branco do final e inicio e tambem evita ataques XSS
        $nome = limpa_dados($_POST['nome']);
        $origem = limpa_dados($_POST['origem']);
        $destino = limpa_dados($_POST['destino']);
        $itens = isset($_POST['itens']) ? implode(", ", $_POST['itens']) : '';
    } 
    
    //verifica se os campos estao vazio
    if (acha_vazio($nome) || acha_vazio($origem) || acha_vazio($destino) || acha_vazio($itens)) {
        echo"Pelo amor de Deus! Preencha os campos Vagabundo!";
        exit();
    }

    inserir_orcamento($conn,$nome,$origem,$destino,$itens);

    echo"Orçamento inserido com sucesso!";

    $conn->close();
} catch(Exception $e){
    echo"Ocorreu um erro: " . $e->getMessage();
}

?>