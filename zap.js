function enviar_no_zap(){
    const $nome = document.getElementById('nome').value.trim();
    const $origem = document.getElementById('origem').value.trim();
    const $destino = document.getElementById('destino').value.trim();
    if(!$nome||!$origem||!$destino){
        alert("Please, fill in all fields before sending via zap");
        return;
    }



    const $telefone = "5511995424085";

    const $itensSelecionados = Array.from(document.querySelectorAll('.item-movel:checked'))
    // Coleta os itens marcados
    .map(item => `✅ ${item.value}`)
    .join('%0A');

    const $msgn = `Olá!%0AQuero um orçamento para mudança:%0A%0A🧑 Nome: ${$nome}%0A📍 Origem: ${$origem}%0A📦 Destino: ${$destino}%0A%0A📋 LISTA DE ITENS:<br>%0A${$itensSelecionados}%0A%0ASe precisar de mais alguma informação conte comigo.`;
    
    const $url = `https://api.whatsapp.com/send?phone=${$telefone}&text=${$msgn}`;
    
    window.open($url, '_blank');

}

