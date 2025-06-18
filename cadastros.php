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
      // Navbar
      require('./template-parts/nav.php');
      // Classe de usuários
      require('./sql/class/userSelect.class.php');
      $userSelect = new UserSelect();
      $usuarios = $userSelect->getAllUsers();
      // Classe de deletar
       require('./sql/class/userDelete.class.php');
       $delete = new UserDelete();
       if (isset($_GET['delete'])) {
            $id = (int)$_GET['delete'];
            $delete->deleteUser($id);
            header('Location: cadastros.php');
            exit;
        }
      //  Classe de atualizar
          require('./sql/class/userUpdate.class.php');
          $update = new UserUpdate();
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
              $id = (int)$_POST['id'];

              // Pegue apenas os campos válidos da tabela
              $fieldsToUpdate = [];

              if (!empty($_POST['login'])) {
                  $fieldsToUpdate['usu_login_acesso'] = trim($_POST['login']);
              }

              if (!empty($_POST['perfil'])) {
                  $fieldsToUpdate['usu_nome'] = trim($_POST['perfil']); // Aqui você pode fazer hash se quiser
              }

              // Chamada ao método update
              $update->updateUser($id, $fieldsToUpdate);
              header('Location: cadastros.php');
              exit;
          }

    ?>
    <article class="section">
      <section class="container">
        <h5 class="center-align">
          Efetue o processo de cadastro
        </h5>
      </section>
      <section class="container">
        
        <form action="./sql/scripts/processInsertUser.php" method="post" class="row">
          <div class="s12 m3 l3 input-field outlined">
            <input id="nome" name="nome" type="text" placeholder=" " maxlength="20">
            <label for="nome">Nome</label>
          </div>
          <div class="s12 m3 l3 input-field outlined">
            <input id="login" name="login" type="text" placeholder=" " maxlength="20">
            <label for="login">Login</label>
          </div>
          <div class="s12 m3 l3 input-field outlined">
            <input id="senha" name="senha" type="password" placeholder=" " maxlength="20">
            <label for="senha">Senha</label>
          </div>
          <div class="s12 m3 l3 input-field outlined">
            <input class="btn-large" type="submit" value="Cadastrar">
          </div>
        </form>
      </section>
    </article>
    <article class="section mt-6">
      <section class="container">
        <h2>Lista de Usuários</h2>
          <table border="1" cellpadding="8">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Login</th>
                      <th>Nome</th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach ($usuarios as $usuario): ?>
                  <tr>
                      <form method="post">
                          <td><?= htmlspecialchars($usuario['usu_codigo']) ?></td>
                          <td>
                              <input type="text" name="login" value="<?= htmlspecialchars($usuario['usu_login_acesso']) ?>" required>
                          </td>
                          <td>
                              <input type="text" name="perfil" value="<?= htmlspecialchars($usuario['usu_nome']) ?>" required>
                          </td>
                          <td>
                              <input type="hidden" name="id" value="<?= $usuario['usu_codigo'] ?>">
                              <button type="submit" name="update">Atualizar</button>
                              <a href="?delete=<?= $usuario['usu_codigo'] ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
                          </td>
                      </form>
                  </tr>
              <?php endforeach; ?>
              </tbody>
          </table>
      </section>
    </article>
    <footer>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="./js/materialize.min.js"></script>
      <script type="text/javascript" src="./js/custom-scripts/scripts.js"></script>
    </footer>
  </body>
</html>