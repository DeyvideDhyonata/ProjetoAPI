const formsServico = document.getElementById('schedule-form');
const spanSuccess = document.getElementById('spanSuccess');
const spanFailed = document.getElementById('spanFailed');
const spanS = document.querySelectorAll('.spanTest');
const spanF = document.querySelectorAll('.spanTestFailed');

formsServico.addEventListener('submit', async (e) => {

  e.preventDefault();

  try{
    const dadosForm = new FormData(formsServico);
    dadosForm.append('action', 'servico');

    const dados = await fetch("../controller/Apis.php", {
        method: "POST",
        body: dadosForm
    });

    console.log(dados);
    
    const resposta = await dados.json();
    console.log(resposta);

    if(resposta['erro'] === false){

        spanSuccess.style.display = "block";
        spanS.innerHTML = resposta['msg'];

          setTimeout(() => {
            spanSuccess.style.display = "none";
          }, 3000);
    }else{

        spanFailed.style.display = "block";
        spanF.innerHTML = resposta['msg'];

        setTimeout(() => {
          spanFailed.style.display = "none";
        }, 3000);
    }
}catch(error){

    console.error('Error: ', error.message);
    console.error('Detailed error: ', error);
}
});