<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>ProjetoAPI - Perfil</title>
</head>
<body>
    <div class="container" id="container" >

        <div class="form-container sign-in">
            <h1>Perfil</h1>
            <img src="" alt="Imagem do Usuário">
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
                        <span>Usuário não foi cadastrado!!</span>
                    </div>

                    <div class='alertcadCorreto alert-successcad' role='alert'>
                        <span>Usuário cadastrado com sucesso!!</span>
                    </div>

                    <input type="text" name="nome" class="regNome required" placeholder="Nome" oninput="registerNome()">
                    <span class="span-required">Preencha o nome corretamente!</span>

                    <input type="text" name="sobrenome" class="regSobrenome required" placeholder="Sobrenome" oninput="registerSobrenome()">
                    <span class="span-required">Preencha o sobrenome corretamente!</span>

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
</body>
</html>