<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <title>Cadastro</title>
  </head>
  <body>

    <div class='container'>
    <div class='row'>

      <br/>
      <br/>
    </div>
        <div class='row'>
              
              <div class='col'>
              <?php
              $nome = $_POST['nome'];
              $endereco = $_POST['endereco'];
              $telefone = $_POST['telefone'];
              $email = $_POST['email'];
              $data_nascimento = $_POST['data_nascimento'];

              include 'conexao.php';
              try{
              $statement = $pdo->prepare("INSERT INTO `pessoa`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES (?,?,?,?,?)");            
              $statement->execute(array($nome,$endereco,$telefone,$email,$data_nascimento));
              echo '<div class="alert alert-success" role="alert">o cadastro de '.$nome.' foi um sucesso!</div>';
            
            }catch(\Error $e){
              echo'<div class="alert alert-danger" role="alert">
                    erro encontrado! '.$e->getMessage().'</div>';
            }finally{
              echo'<a href="index.php" class="btn btn-primary">Voltar</a>';
            }
              
              
      ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>