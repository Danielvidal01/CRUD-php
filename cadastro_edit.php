<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <title>Editar</title>
  </head>
  <body>
  <?php
    include 'conexao.php';
    $id = $_GET['id'] ?? '';
    $pdoStatement = $pdo->query("SELECT * FROM pessoa WHERE cod_pessoa = '$id' ");
    while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){
      $nome =$row['nome'];
      $endereco =$row['endereco'];
      $telefone =$row['telefone'];
      $email =$row['email'];
      $data_nascimento =$row['data_nascimento'];
    }
    
  ?>
    <div class='container'>
        <div class='row'>
            <div class='col'>
                <h1>Editar</h1>
                <form action="edit_script.php?id=<?php echo $id;?>" method='POST'>
                    <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input  type="text" class="form-control" name='nome'required value='<?php echo $nome; ?>' >
                    </div>
                    
                    <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input  type="text" class="form-control" name='endereco'required value='<?php echo $endereco; ?>' >
                    </div>

                    <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input  type="text" class="form-control" name='telefone'required value='<?php echo $telefone; ?>'>
                    </div>

                    <div class="form-group">
                    <label for="email">Email</label>
                    <input  type="email" class="form-control" name='email'required value='<?php echo $email; ?>'>
                    </div>

                    <div class="form-group">
                    <label for="dt_nascimento">Data de Nascimento</label>
                    <input  type="date" class="form-control" name='data_nascimento'required value='<?php echo $data_nascimento; ?>'>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="salvar alterações     ">
                    <input type='hidden' name='id' value ='<?php echo $id; ?>'>
                    <a href='index.php' class="btn btn-primary">Voltar</a>
                    </div>
                </form>
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