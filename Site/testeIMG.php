<!DOCTYPE html>
<html lang="en">
    <?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";?>
  <head>
    <title>NeTree</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="css/fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/magnific-popup.css">
    <link rel="stylesheet" href="css/css/jquery-ui.css">
    <link rel="stylesheet" href="css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/css/owl.theme.default.min.css">
    <link rel="icon" href="css/Images/logoVerde.png" type="image/x-icon" />

    <link rel="stylesheet" href="css/css/aos.css">

    <link rel="stylesheet" href="css/css/style.css">

    <script type="text/javascript" src="js/cards.js"></script>
    
  </head>
  <body>
  
  <div class="site-wrap">
    

    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Oi, o que procura hoje? :)">
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone">NeTree</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children ">
                  <a href="index.html">Produtos</a>
                  <ul class="dropdown">
                    <li><a href="#">Flores</a></li>
                    <li><a href="#">Suculentas</a></li>
                    <li><a href="#">Mudas</a></li>
                    <li class="has-children">
                      <a href="#">Outros</a>
                      <ul class="dropdown">
                        <li><a href="#">Vasos</a></li>
                        <li><a href="#">Terras e Substratos</a></li>
                        <li><a href="#">Presentes</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="contact.html">Contato</a></li>
                <li><a href="sobre.html">Sobre a NeTree</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="login.html" class="icons-btn d-inline-block"><span class="icon-user"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <!-- <span class="number">2</span> -->       
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-blocks-cover inner-page" style="background-image: url('images/background.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center" data-aos="fade">
      <div class="container">
        <div class="row">
        
        </div>
      </div>
    </div>

<table> 
	
       <tr><td><b>Código</b></td>
        <td><b>nome</b></td> 
        <td><b>em</b></td> 
        <td><b>*</b></td> 
        <td><b>*</b></td> 
        <td><b>*</b></td> 
        <td><b>em</b></td> 
        <td><b>*</b></td> 
    </tr>
    <?php 
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM Usuario");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        ?>
        <tr><td><?php echo $linha['codUsuario'];?></td>
            <td><?php echo $linha['nomeUsuario'];?></td>
            <td><?php echo $linha['email'];?></td>
            <td><?php echo $linha['dataNasc'];?></td>
            <td><?php echo $linha['CPF'];?></td>
            <td><?php echo $linha['genero'];?></td>
            <td><?php echo $linha['telefone'];?></td>
            <td><?php echo $linha['imagem'];?></td>
        </tr>
    <?php } ?>       
    </table>
    </html>