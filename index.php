<?php 
require_once('./src/controllers/PessoaController.php');
$controller = new PessoaController();
$pessoas  = $controller->index();
if(isset($_POST['nome_pessoa']) && isset($_POST['data_nasc'])){
  $controller->save($_POST['nome_pessoa'], $_POST['data_nasc']);
}
if(isset($_GET['action']) && $_GET['action'] == "delete-pessoa"){
  $controller->delete();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
    <!-- Importando Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">  </head>
  <body>
    <div class="container mt-5">
      <h2 class="mb-4">Cadastro de Pessoas</h2>
      <form action="./index.php" method="POST">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control">
        </div>
        <div class="mb-3">
          <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
          <input type="date" id="data_nasc" name="data_nasc" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
    <div class="container mt-5">
    <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Data de Nascimento</th>
              <th>Excluir</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pessoas as $pessoa) {?>
              <tr>
                  <td><?php echo $pessoa["nome_pessoa"]; ?></td>
                  <td><?php echo $pessoa["data_nasc"]; ?></td>
                  <td><a href="index.php?action=delete-pessoa&id=<?php echo $pessoa["id_pessoa"]; ?>">Excluir</a></td>
                  <td><a href="./update.php?id=<?php echo $pessoa["id_pessoa"]; ?>">Update</a></td>
                </tr>
                <?php } ?>
          </tbody>
    </table>
    </div>
    <!-- Importando os scripts do Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
