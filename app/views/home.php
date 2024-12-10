<?php

// session_start();

// if(!isset($_SESSION['email']) == TRUE){

//     unset($_SESSION['tipo_usuario']);
//     unset($_SESSION['nome_completo']);
//     unset($_SESSION['email']);
//     unset($_SESSION['telefone']);

//     sleep(1);
//     header("Location: ../../index.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styleh.css" />
    <title>Pet TchuTchucão</title>
  </head>
  <body>
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="#">Pet TchuTchucão</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#service">Serviços</a></li>
        <li><a href="#store">Produtos</a></li>
      </ul>
    </nav>
    <header id="home">
      <div class="section__container header__container">
        <div class="header__content">
          <h4>Bem-Vindo</h4>
          <h1>Pet<br /><span>TchuThucão</span></h1>
          <h2>Nós amamos os pets como você :)</h2>
          <p>
            De check-ups de rotina a tratamentos especializados, estamos aqui para 
            Garantir que seus animais de estimação tenham uma vida feliz e saudável.
          </p>
        </div>
        <div class="header__image">
          <img
            src="header-bg.png"
            alt="header-bg"
            class="header__image-bg"
          />
          <img src="header.png" alt="header" />
        </div>
      </div>
      <div class="header__bottom"></div>
    </header>

    <section class="section__container service__container" id="service">
      <h2 class="section__header">Conheça nossos serviços</h2>
      <div class="service__flex">
        <div class="service__card">
          <div>
            <img src="service-1.png" alt="service" />
          </div>
          <p>Cuidados Veterinário</p>
          <a href="#">Agende Aqui</a>
        </div>
        <div class="service__card">
          <div>
            <img src="service-2.png" alt="service" />
          </div>
          <p>Vacinação</p>
          <a href="#">Agende Aqui</a>
        </div>
        <div class="service__card">
          <div>
            <img src="service-3.png" alt="service" />
          </div>
          <p> Banho e Tosa</p>
          <a href="#">Agende Aqui</a>
        </div>
        
        <div class="service__card">
          <div>
            <img src="service-4.png" alt="service" />
          </div>
          <p>Pet Sitting</p>
          <a href="#">Agende Aqui</a>
        </div>
        <div class="service__card">
          <div>
            <img src="service-5.png" alt="service" />
          </div>
          <p>Dog Walking</p>
          <a href="#">Agende Aqui</a>
        </div>
      </div>
    </section>


    <section class="section__container about__container" id="about">
      <h2 class="section__header">O que podemos fazer por você</h2>
      <div class="about__row">
        <div class="about__image">
          <img src="about-1.jpg" alt="about" />
        </div>
        <div class="about__content">
          <span><img src="about-1-icon.png" alt="about-icon" /></span>
          <h4>Deixe-nos ajudá-lo com a saúde do seu pet!</h4>
          <p>
            Nosso pessoal especializado
            está aqui para fornecer cuidados abrangentes e orientação para garantir que seu animal de estimação permaneça em perfeita saúde e seja feliz.
          </p>
        </div>
      </div>
    </section>

    <section class="product" id="store">
      <div class="section__container product__container">
        <h2 class="section__header">Produtos em destaque</h2>
        <div class="product__grid">
          <div class="product__card">
            <img src="product-1.jpg" alt="product" />
            <h4>Sacos de lixo para cachorro</h4>
            <p>
                Sacos de lixo convenientes e ecológicos para facilitar o desperdício de animais de estimação disposição.
            </p>
            <h3>R$ 29,50</h3>
          </div>
          <div class="product__card">
            <img src="product-2.png" alt="product" />
            <h4>Acessórios para Pets</h4>
            <p>
                Explore a nossa gama de acessórios elegantes e funcionais para o seu amigos peludos.
            </p>
            <h3>R$ 49,99 </h3>
          </div>
          <div class="product__card">
            <img src="product-3.jpg" alt="product" />
            <h4>Ração para Gatos</h4>
            <p>
                Alimentos nutritivos e deliciosos para manter seu animal de estimação saudável e feliz.
            </p>
            <h3>R$ 132,89</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container intro__container">
      <h2 class="section__header">Nos Conheça</h2>
      <div class="intro__grid">
        <div class="intro__card">
          <div class="intro__image">
            <img src="intro-1.png" alt="intro" />
          </div>
          <h4>Especialistas Pet</h4>
          <p>
            Agende aqui e conheça nossos profissionais e serviços, dedicados ao bem-estar do seu pet.
          </p>
          <a href="#">Clique Aqui</a>
        </div>
        <div class="intro__card">
          <div class="intro__image">
            <img src="intro-2.png" alt="intro" />
          </div>
          <h4>Serviços Vet</h4>
          <p>
            Oferecendo uma ampla gama de serviços veterinários para manter seus animais de estimação saudável e feliz.
          </p>
        </div>
        <div class="intro__card">
          <div class="intro__image">
            <img src="intro-3.png" alt="intro" />
          </div>
          <h4>Contate-nos</h4>
          <p>
            Entre em contato conosco para qualquer dúvida ou agende uma consulta para o cuidado do seu animal de estimação.
          </p>
          <a href="#">Clique Aqui</a>
        </div>
      </div>
    </section>

    <footer id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="footer__logo">
            <a href="#">TchuTchucão PetShop</a>
          </div>
        </div>
        <div class="footer__col">
          <h4>Company</h4>
          <ul class="footer__links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="#">Serviços</a></li>
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Faq</a></li>
            <li><a href="#">Contate-Nos</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Follow Us</h4>
          <ul class="footer__socials">
            <li>
              <a href="#"><i class="ri-facebook-fill"></i></a>
            </li>
            <li>
              <a href="#"><i class="ri-instagram-line"></i></a>
            </li>
            
          </ul>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024. All rights reserved.
      </div>
    </footer>

    <script src=""></script>
  </body>
</html>
