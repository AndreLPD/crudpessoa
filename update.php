<?php 
require_once('./src/controllers/PessoaController.php');
$controller = new PessoaController();
$id = $_GET['id'];
$pessoa = $controller->listById($id);
if(isset($_POST['nome_pessoa']) && isset($_POST['data_nasc'])){
  $controller->update($_GET['id'], $_POST['nome_pessoa'], $_POST['data_nasc']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">  </head>
</head>
<body>
<div class="container mt-5">
      <h2 class="mb-4">Update - Cadastro de Pessoas</h2>
      <form method="POST">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" id="nome_pessoa" name="nome_pessoa" value=<?php echo $pessoa["nome_pessoa"] ?> class="form-control">
        </div>
        <div class="mb-3">
          <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
          <input type="date" id="data_nasc" name="data_nasc" value= <?php echo $pessoa["data_nasc"] ?> class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
</body>
</html>