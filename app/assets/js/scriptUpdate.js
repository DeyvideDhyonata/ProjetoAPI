const formsUpdate = document.querySelector('.formsUpdate');
const spanSuccess = document.getElementById('spanSuccess');

formsUpdate.addEventListener('submit', async (e) =>{

    e.preventDefault();

    try{
        const dadosForm = new FormData(formsUpdate);
        dadosForm.append('action', 'update');

        const dados = await fetch("../controller/Apis.php", {
            method: "POST",
            body: dadosForm
        });
        
        const resposta = await dados.json();
        console.log(resposta);

        if(resposta['erro'] === false){

            spanSuccess.style.display = "block";

            setTimeout(() => {
                spanSuccess.style.display = "none";
            }, 3000);


        } else{

            console.log("Erro");
            // alertLogin_Falha.style.display = "block";
            // alertLogin_Falha.innerHTML = resposta['msg'];

            // setTimeout(() => {
            //     alertLogin_Falha.style.display = "none";
            // }, 3000);
        }
    }catch(error){

        console.error('Error: ', error.message);
        console.error('Detailed error: ', error);
    }

});
