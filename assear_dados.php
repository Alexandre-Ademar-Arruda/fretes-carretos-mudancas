<?php
function limpa_dados($dados) {
    try {
        if(!is_string($dados)){
            throw new Exception("O valor fornecido nao é uma string.");
        }
        $dados = htmlspecialchars(trim($dados));
        if(!preg_match('/[a-zA-ZÀ-Ú]/',$dados)){
            throw new Exception("Preencha os campos corretamente");
        }

        return $dados;
    } catch (Exception $e) {
        return "";
    }
}
    //htmlspecialchars()
    //Evita ataques XSS ou seja impede que tags sejam interpretadas com comandos no formulario.
    //trim()
    //Remove espaços em branco no inicio e do fim de uma string