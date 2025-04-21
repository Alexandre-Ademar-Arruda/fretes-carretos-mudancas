<?php
//aqui criamos a function 'inserir_orcamento() que recebe 4 parametros 
function inserir_orcamento($conn,$nome,$origem,$destino,$itens){
    //montando a query para inserir os dados
    $sql = "INSERT INTO orcamento(nome, origem, destino, itens) VALUES(?,?,?,?)";
    //preparando a query
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        //se a preparação falhar lança uma nova exceção
        throw new Exception("Erro ao preparar a query: " . $conn->error);
    }


    $stmt->bind_param("ssss",$nome,$origem,$destino,$itens);

    if(!$stmt->execute()){
        throw new Exception("Erro ao executar a query: " . $stmt->error);
    }
    $stmt->close();
}