const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const campos = document.querySelectorAll('.required');
const span = document.querySelectorAll('.span-required');
const formsLog = document.querySelector('.logForm');
const formsCad = document.querySelector('.cadForm');
const alertSucesso = document.querySelector('.alertcadCorreto');
const alertFalha = document.querySelector('.alertcadIncorreto');
const alertLogin_Sucesso = document.querySelector('.alertCorreto');
const alertLogin_Falha = document.querySelector('.alertIncorreto');
const btnEye = document.querySelector('.bi');
const btnEyeSlash = document.querySelector('#bi-slash');



function setError(index){

    campos[index].style.border = "1px solid #e63636";
    span[index].style.display = "block";
}

function removeError(index){
    // 1px solid #65B307 cor verde
    campos[index].style.border = "";
    span[index].style.display = "none";
}

function verifEmail(){
    if(campos[0].value.length == 0){

       setError(0);
    }else{

        removeError(0);
    }
}

function verifSenha(){
    if(campos[1].value.length == 0){

        setError(1);
    }else{
        
        removeError(1);
    }
}

function registerNome(){
    if(campos[2].value.length == 0){
        
        setError(2);
    }else{

        removeError(2);
    }
}

function registerSobrenome(){
    if(campos[3].value.length == 0){
        
        setError(3);
    }else{

        removeError(3);
    }
}

function registerEmail(){
    if(campos[4].value.length == 0){

       setError(4);
    }else{
        	
        removeError(4);
    }
}

function registerSenha(){
    if(campos[5].value.length < 6){

        setError(5);
    }else{
        
        removeError(5);
    }
}

// Formulário
formsLog.addEventListener('submit', async (event) => {

    event.preventDefault(); // preventDefault objeto para não recarregar a página

    if(campos[0].value === ""){

        setError(0);
    }else if(campos[1].value === ""){

        setError(1);
    }else{

        try{
            const dadosForm = new FormData(formsLog);
            dadosForm.append('action', 'select');

            const dados = await fetch("./app/controller/Apis.php", {
                method: "POST",
                body: dadosForm
            });
            
            const resposta = await dados.json();
            console.log(resposta);

            if(resposta['erro'] === false){

                alertLogin_Sucesso.style.display = "block";
                alertLogin_Sucesso.innerHTML = resposta['msg'];

                // Trocar para página principal de perfil como exemplo, não esquecer.

                setTimeout(() => {
                    alertLogin_Sucesso.style.display = "none";
                    window.location.assign("./perfil.php");
                }, 1000);
            }else{

                alertLogin_Falha.style.display = "block";
                alertLogin_Falha.innerHTML = resposta['msg'];

                setTimeout(() => {
                    alertLogin_Falha.style.display = "none";
                }, 3000);
            }
        }catch(error){

            console.error('Error: ', error.message);
            console.error('Detailed error: ', error);
        }
    }
});

// Melhorar o código mais para frente.

formsCad.addEventListener('submit', async (event) => {

    event.preventDefault(); // preventDefault objeto para não recarregar a página.

    if(campos[2].value === ""){
        
        setError(2);
    }else if(campos[3].value === ""){
        
        setError(3);
    }else if(campos[4].value === ""){
        
        setError(4);
    }else if(campos[5].value.length < 6){

        setError(5);
    }else{

        // console.log("Pode fazer o cadastro normal caiu no else de cadastro");
        try{
            const dadosForm = new FormData(formsCad); // Cria um FormData a partir de um formulário. 
            dadosForm.append('action','insert');
            dadosForm.append("add", 1); // Adiciona um novo par chave-valor ao objeto, "add" é a chave para identificar o valor, "1" é o valor associado a chave.   

            const dados = await fetch("./app/controller/Apis.php", { // Fetch faz uma requisição HTTPs para o documento da API
                method: "POST", // Metodo da requisição que vai vir a API
                body: dadosForm, 
            });

            console.log(dados);

            const resposta = await dados.json();
            console.log(resposta);

            if(resposta['erro'] == false){

                alertSucesso.style.display = "block";

                setTimeout(() => {
                    alertSucesso.style.display = "none";
                }, 3000);
            }else{

                alertFalha.style.display = "block";
                alertFalha.innerHTML = resposta['msg'];

                setTimeout(() => {
                    alertFalha.style.display = "none";
                }, 3000);
            }
        }catch(error){
            console.error('Error: ', error.message);
            console.error('Detailed error: ', error);
        }
    }
});

// Botão evento troca de tela. 
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

btnEye.addEventListener('click', () => {
    
    const type = campos[1].type === "password" ? "text" : "password";

    if(campos[1].type === "password"){

        campos[1].type = type;
        btnEye.style.display = "none";
        btnEyeSlash.style.display = "block";
    }
});

btnEyeSlash.addEventListener('click', () => {

    const type = campos[1].type === "passsword" ? "text" : "password";

    if(campos[1].type === "text"){

        campos[1].type = type;
        btnEyeSlash.style.display = "none";
        btnEye.style.display = "block";
    }
});


