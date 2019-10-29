function pesquisaDados(nome){
    //console: quero saber o que está escrito, mas não aparece na tela
    //é como se fosse um debug, use o inspecionar elemento
    console.log(nome);
    fetch('pesquisar.php', {
        method: 'POST',
        body: new URLSearchParams('nome=' + nome)
    })
    .then(res => res.json())
    .then(res => visualizarResultado(res))
    .catch(e => console.log(e))
}

function visualizarResultado(dados){
    const listaNomes = document.getElementById("listaNomes");
    
    listaNomes.innerHTML = "";

    for (let i = 0; i < dados.length; i++){
        const li = document.createElement("li");
        li.innerHTML = dados[i]["nome"];
        listaNomes.appendChild(li);
    }
}