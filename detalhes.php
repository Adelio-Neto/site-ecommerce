

<?php

require_once 'php/produto.php';
require_once 'php/adicionarProduto.php';


// Obtendo o ID do produto passado via GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verificando se o produto existe
if (!isset($produtos[$id])) {
    echo "Produto não encontrado!";
    exit;
}

// Obtendo o produto com base no ID
$produto = $produtos[$id];
?>
<!doctype html >
<html lang="PT-pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Risuu.store</title>
</head>

<body>

  <div class="search-form" id="search-form">
    <form action="shop.php" method="GET">
    <input type="search"  name="query" id="query" class="form-control" placeholder="Pesquisar...">
      <button class="button">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
      </button>
      <button class="button">
        <div class="close-search">
          <span class="icofont-close js-close-search"></span>
        </div>
      </button>

    </form>
  </div>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>



  <nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">

      <div class="container position-relative">
        <div class="site-navigation text-center dark">
          <a href="index.php" class="logo menu-absolute m-0">Risuu.store<span class="text-primary">.</span></a>

          <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
            <li><a href="index.php">Início</a></li>
            <li>
							<a href="shop.php?tipo">Loja</a>
						</li>
            <li class="has-children">
							<a href="#">Opções</a>
							<ul class="dropdown">
								<li><a href="about.php">Sobre Nós</a></li>
								<li><a href="contact.php">Contacte-nos</a></li>
								<li ><a href="cart.php">Carrinho</a></li>
								<li><a href="checkout.php">Checkout</a></li>
								<li class="has-children">
									<a href="#">Menu Two</a>
									<ul class="dropdown">
										<li><a href="#">T-Shirt</a></li>
										<li><a href="#">Underware</a></li>
										<li><a href="#">Clothing</a></li>
										<li><a href="#">Watches</a></li>
										<li><a href="#">Shoes</a></li>

									</ul>
								</li>
							</ul>
						</li>
          </ul>




          <div class="menu-icons">

            <a href="#" class="btn-custom-search" id="btn-search">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
              </svg>
            </a>
            <a href="cart.php" class="cart">
              <span class="item-in-cart"><?php echo quantidadeTotalNoCarrinho(); ?></span>
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg>
            </a>

          </div>

          <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>


  <div class="page-heading bg-light">
    <div class="container">
      <div class="row align-items-end text-center">
        <div class="col-lg-7 mx-auto">
          <h1>Detalhes</h1>  
          <p class="mb-4"><a href="index.php">Início</a> / <strong>Detalhes</strong></p>        
        </div>
      </div>
    </div>
  </div>



  <div class="services-section" style="margin-top: 80px;">
    <div class="container">
      <div class="row justify-content-between">
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
          <figure class="img-wrap-2">
          <img src="<?php echo $produto['image']; ?>" alt="Image"  class="img-fluid" >
            <div class="dotted"></div>
          </figure>

        </div>
        <div class="col-lg-5 mb-5 mb-lg-12 col-12">

          <div class="container section-title mb-3" data-aos="fade-up" data-aos-delay="0">
            
          

             <h2  data-aos="fade-up" data-aos-delay="300" class="line-bottom mb-4"><?php echo $produto['nome']; ?></h2>
             <p data-aos="fade-down" data-aos-delay="100"><strong>Preço : </strong>  <?php echo number_format($produto['preco'], 2); ?></p>
             <p data-aos="fade-down" data-aos-delay="100"><strong>Categoria : </strong> <?php echo $produto['tipo']; ?></p>
             <div  class="mb-4"  style="display: flex;align-items: center;">
                <p data-aos="fade-up" data-aos-delay="100" class="mb-2"><strong>Quantidade : </strong></p>
                
                <div style="width:50px;margin-left:10px"> 
                <input type="text" class="form-control text-center" name="quantidade" value="1">
                </div>
            </div>
          
             <div class="row">
              <div class="col-lg-6">
                <p class="mb-2" data-aos="fade-up" data-aos-delay="300"><a href="?adicionar=<?php echo $id; ?>" class="btn btn-outline-black">Add Carrinho</a></p>
              </div>
              <div class="col-lg-6">
               <p class="mb-2" data-aos="fade-up" data-aos-delay="300"><a href="checkout.php?adicionar=<?php echo $id; ?>" class="btn btn-black">Comprar agora</a></p> 
              </div>
             </div>
          </div>


        </div>

      </div>

      <div class="col-lg-6 col-12">
        <h2 class="line-bottom mb-3">Descrição :</h2>
        <p data-aos="fade-up" data-aos-delay="100"><?php echo $produto['descricao']; ?></p>
      </div>
    </div>
  </div>




   


    <!-- Page Content -->
  <div class="site-footer">


    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="widget mb-4">
            <h3 class="mb-2">About UntreeStore</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate modi cumque rem recusandae quaerat at asperiores beatae saepe repudiandae quam rerum aspernatur dolores et ipsa obcaecati voluptates libero</p>
          </div>
          <div class="widget">
            <h3>Join our mailing list and receive exclusives</h3>
            <form action="#" class="subscribe">
              <div class="d-flex">
                <input type="email" class="form-control" placeholder="Email address">
                <input type="submit" class="btn btn-black" value="Subscribe">
              </div>
            </form>

            
          </div>
        </div>
        <div class="col-lg-2">
          <div class="widget">
            <h3>Help</h3> 
            <ul class="list-unstyled">
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Account</a></li>
              <li><a href="#">Shipping</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">FAQ</a></li>   
            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="widget">
            <h3>About</h3>
            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Press</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">FAQ</a></li>   
            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="widget">
            <h3>Shop</h3>
            <ul class="list-unstyled">
              <li><a href="#">Store</a></li>
              <li><a href="#">Gift Cards</a></li>
              <li><a href="#">Student Discount</a></li>
            </ul>
          </div>
        </div>
        
      </div>


      <div class="row mt-5">
        <div class="col-12 text-center">
          <ul class="list-unstyled social">
            <li><a href="#"><span class="icon-facebook"></span></a></li>
            <li><a href="#"><span class="icon-instagram"></span></a></li>
            <li><a href="#"><span class="icon-linkedin"></span></a></li>
            <li><a href="#"><span class="icon-twitter"></span></a></li>
          </ul>
        </div>
        <div class="col-12 text-center copyright">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
          </p>

        </div>
      </div>
    </div> <!-- /.container -->
  </div> <!-- /.site-footer -->

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>
