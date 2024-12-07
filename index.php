<?php 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <title>ProjetoAPI - Login</title>
</head>
<body>

    <div class="container" id="container" >

        <div class="form-container sign-in">
            <form action="" class="logForm" method="POST">
                <h1>Login</h1>
                    <div class="social-icons">
                        <!-- Site font awesome -->
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <span>Digite suas credencias para entrar</span>

                    <div class='alertCorreto alert-success' role='alert'>
                        <span></span>
                    </div>

                    <div class='alertIncorreto alert-danger' role='alert'>
                        <span></span>
                    </div>

                    <input type="email" name="email" class="logEmail required" placeholder="E-mail" oninput="verifEmail()">
                    <span class="span-required">Preencha o email corretamente!</span>
                    
                    <input type="password" name="senha" class="logSenha required" placeholder="Senha" oninput="verifSenha()">
                    <!-- <i class="bi bi-eye"></i>
                    <i id="bi-slash" class="bi bi-eye-slash"></i> -->
                    <span class="span-required">Preencha a senha corretamente!</span>

                    <a href="">Esqueceu sua Senha?</a>
                    <button type="submit" class="btnEntrar">Entrar</button>
            </form>
        </div>

        <div class="form-container sign-up">
            <form action="" class="cadForm" method="POST">
                <h1>Registre-se</h1>
                    <div class="social-icons">
                        <!-- Site font awesome -->
                        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>

                    <span>Crie sua conta</span>

                    <div class='alertcadIncorreto alert-dangercad' role='alert'>
                        <span></span>
                    </div>

                    <div class='alertcadCorreto alert-successcad' role='alert'>
                        <span></span>
                    </div>

                    <input type="text" name="nome_completo" class="regNome required" placeholder="Nome Completo" oninput="registerNome()">
                    <span class="span-required">Preencha o nome corretamente!</span>

                    <input type="text" name="telefone" class="required" placeholder="Telefone">
                    <span class="span-required">Preencha o telefone corretamente!</span>

                    <input type="email" name="email" class="regEmail required" placeholder="E-mail" oninput="registerEmail()">
                    <span class="span-required">Preencha o email corretamente!</span>

                    <input type="password" name="senha" class="regSenha required" placeholder="Senha" oninput="registerSenha()">
                    <span class="span-required">A senha precisa ter 6 digitos no mínimo!</span>

                    <button type="submit" class="btnRegistrar">Criar</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem vindo!</h1>
                    <p>Utilize seu e-mail para entrar na sua conta.</p>

                    <button class="hidden" id="login">Entrar</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Bem Vindo!</h1>
                    <p>Registre-se, para poder utilizar o nosso site.</p>

                    <button class="hidden" id="register">Registrar</button>
                </div>
            </div>
        </div>
    </div>


<script src="./app/assets/js/script.js"></script>
</body>
</html>