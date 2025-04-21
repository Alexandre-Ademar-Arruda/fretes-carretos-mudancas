<?php
require_once 'assear_dados.php';
function acha_vazio($dados) {
    try {
            if(!is_string($dados)){
                throw new Exception("O valor fornecido nao é uma string");
            }
            return empty(limpa_dados($dados));
    } catch (Exception $e) {
        echo "Erro na verificação de campo vazio: " . $e->getMessage();
        return true;
    }
}
?>
