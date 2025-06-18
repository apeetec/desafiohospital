<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Gabriel Batista">
    <!-- Descrição -->
    <meta name="description" content="">
    <!-- Titulo -->
    <title></title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="">
    <!-- CSS Gabriel -->
    <link href="./css/style.css" type="text/css" rel="stylesheet">
    <link href="./css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
     require_once ('./sql/class/db.class.php');
    // Verificar quem está logado
      // require_once ('./sql/scripts/verifyLoggin.php');
      // Navbar
      require('./template-parts/nav.php');
    ?>
    <main>     
      <div class="parallax-container">
        <div class="parallax"><img src="img/test1.jpg"></div>
      </div>
      <article class="container">
        <section class="login mt-6 mb-6">
          <h5 class="center-align" id="missao">Faça o login</h5>
          <form class="row g-1" action="./sql/scripts/process_login.php" method="post">
            <div class="col s12 m12 l12 mt-4">
              <div class="input-field outlined">
                <i class="material-icons prefix">account_circle</i>
                <input id="login" type="text" name="usuario" class="validate" required placeholder=" ">
                <label class="active" for="login">Login</label>
              </div>
            </div>
            <div class="col s12 m12 l12">
              <div class="input-field outlined">
                <span class="material-icons prefix">key</span>
                <input id="senha" type="password" name="senha" class="validate" required placeholder=" ">
                <label class="" for="senha">Senha</label>
              </div>
            </div>
            <div class="col s12 m12 l12">
              <div class="row g-1">
                <div class="col s12 m12 l4">
                  <input class="btn icon-right waves-effect waves-light acess center-align" type="submit" value="Acessar">
                </div>
                <div class="col s12 m12 l4">
                  <button class="btn icon-right waves-effect waves-light forgot center-align" type="submit" name="action">
                    Esqueci minha senha
                  </button>
                </div>
                <div class="col s12 m12 l4">
                  <button class="btn icon-right waves-effect waves-light signup center-align" type="submit" name="action">
                    Cadastre-se
                  </button>
                </div>
              </div>
            </div>




          </form>
        </section>
      </article>
    </main>
    <footer>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="./js/materialize.min.js"></script>
      <script type="text/javascript" src="./js/custom-scripts/scripts.js"></script>
    </footer>
  </body>
</html>