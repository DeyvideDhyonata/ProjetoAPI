<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/secondStyle.css">
</head>
<body>
<nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="./home.php">PetShop TchuTchucão</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#service">Serviços</a></li>
        <li><a href="#store">Produtos</a></li>
        <?php 
            if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === "adm"){

              echo "<li>
              <a href=\"./adm_perfil.php\">Administrador</a>
              </li>";
            }else{

            echo "<li>
              <a href=\"./perfil.php\">Perfil</a>
              </li>";
            }
          ?>
          <li><a class="nav-link text-danger link-danger text-decoration-none" href="../controller/logout.php">Sair</a></li>
      </ul>
    </nav>


  <!-- <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

      <a class="navbar-brand" href="./home.php">Logo</a>

      <p class="navbar-brand">Bem-Vindo! <?php //echo $_SESSION['nome_completo'] ?></p>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link text-danger" href="../controller/logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
