<!DOCTYPE html>
<html lang="en">
  <head>
    <title>NeTree</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../css/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css/magnific-popup.css">
    <link rel="stylesheet" href="../css/css/jquery-ui.css">
    <link rel="stylesheet" href="../css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/css/owl.theme.default.min.css">
    <link rel="icon" href="../css/images/logoVerde.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/css/aos.css">
    <link rel="stylesheet" href="../css/css/style.css">
    <script type="text/javascript" src="../css/js/cards.js"></script>
    <!-- <script>
      
      alert("Programador, não esqueça de atualizar o git");
      
      </script> -->

      <style>
.quatro {
  width:25%;
  text-align: center;
  margin-top: 0.5cm;
}

      </style>
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
              <a href="../home.php" class="js-logo-clone" title="Início">NeTree</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children ">
                  <a href="home.php" title="Produtos">Produtos</a>
                  <ul class="dropdown">
                    <li><a href="MostraPlantas.php" title="Plantas">Plantas</a></li>
                    <li><a href="MostraProdutos.php" title="Outros">Outros</a></li>
                  </ul>
                </li>
                <li><a href="../contact.html" title="Contato">Contato</a></li>
                <li><a href="../sobre.html" title="Sobre a equipe">Sobre a NeTree</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open" title="Buscar"><span class="icon-search"></span></a>
            <a href="usuario/login.html" class="icons-btn d-inline-block" title="Usuário"><span class="icon-user"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o" title="Favoritos"></span></a>
            <a href="carrinho.html" class="icons-btn d-inline-block bag" title="Carrinho">
              <span class="icon-shopping-bag"></span>
              <!-- <span class="number">2</span> -->       
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="../home.php">Home</a> <span class="mx-2 mb-0">/</span><span class="mx-2 mb-0">administrador</span> <span class="mx-2 mb-0">/</span> <a href="RegistrosProdutos.php">Registros de Produtos</a></div>
        </div>
      </div>
    </div>
    
    <!-- img de fundo -->
    <div class="site-blocks-cover inner-page" style="background-image: url('../css/images/background.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center">
      <div class="container">
        <div class="row">
        
        </div>
      </div>
    </div>
    <br>
    <center>
      <h3 class="text-uppercase">
        Produtos cadastrados
      </h3>
      </center>
    <div class="row">
    <table class="table" style="text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo</th>
      <th scope="col">Valor</th>
      <th scope="col">Estoque</th>
      <th scope="col">Imagem</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
        <?php

        try{
          include_once "../conf/Conexao.php";
          
          require "../classes/adm.php";
          
          $pdo = Conexao::getInstance();
          $adm = new Adm($pdo);
          }catch(Exception $e){
              echo $e->getCode();
          }
          
        $produtos = $adm->view("produtos");
        $produto_sub = "";
    
        
        if(count($produtos)>0){
    
        foreach($produtos as $Produto){   
          
           echo $produto_sub."<tr><th scope='row'>".$Produto['cod']."</th><td>".$Produto['nome']."</td>
           <td>".$Produto['tipo']."</td><td>".$Produto['valor']."</td><td>".$Produto['estoque']."</td>
           <td><img style='width: 50px;height: 50px;' src='../Upload/Produtos/".$Produto['img']."'></td>
           <td><form action='..//classes/adm.php'><button class='btn-sm btn-outline-primary' type='submit' formaction='..//classes/adm.php'>#</button></form></td>
           <td><form action='..//classes/adm.php'><button class='btn-sm btn-outline-primary' type='submit' formaction='..//classes/adm.php'>X</button></form></td>
         </tr>";
          }
        }
        
?>
</tbody>
</table>
</div>
  </div>
  <footer class="site-footer custom-border-top">
    <div class="container">
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
          Developed by Alessandra, Camila, Diógenes, Hanattan, Kauana, Maria and Mateus <br> &copy;<script>document.write(new Date().getFullYear());</script> <i class="icon-heart" aria-hidden="true"></i>
          </p>
        </div>
      </div>
    </div>
  </footer>


  <script src="../css/js/jquery-3.3.1.min.js"></script>
  <script src="../css/js/jquery-ui.js"></script>
  <script src="../css/js/popper.min.js"></script>
  <script src="../css/js/bootstrap.min.js"></script>
  <script src="../css/js/owl.carousel.min.js"></script>
  <script src="../css/js/jquery.magnific-popup.min.js"></script>
  <script src="../css/js/aos.js"></script>

  <script src="../css/js/main.js"></script>
  </body>
</html>
