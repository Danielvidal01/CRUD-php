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
            <div class='col'>
                    <h1>Cadastro</h1>
                <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action ='pesquisa.php' method='POST'>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='busca' autofocus>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">pesquisar</button>
                </form>
                    <a href="index.php" class="btn btn-primary">Voltar</a>
                </nav>
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">endereço</th>
                    <th scope="col">telefone</th>
                    <th scope="col">data de nascimento</th>
                    <th scope="col">funções</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                function ListaPessoas($cod_pessoa,$nome,$endereco,$telefone,$data_nascimento){
                    echo "<tr>
                        <th>{$cod_pessoa}</td>
                        <td>{$nome}</td>
                        <td>{$endereco}</td>
                        <td>{$telefone}</td>
                        <td>{$data_nascimento}</td>
                        <td>
                        <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-secondary'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sn' data-toggle='modal'data-target='#confirma'onclick=" .'"'."get_data($cod_pessoa, '$nome')".'"'.">apagar</a>
                        </td>
                        </tr>";
                }

                function setData($date){
                    $dt = explode("-",$date);
                    $final = $dt[2].'/'.$dt[1].'/'.$dt[0];
                    return $final;
                }
                
                include 'conexao.php';

                if(isset($_POST['busca']) && $_POST['busca']!==''){
                    $pesquisa = $_POST['busca'];
                    $pdoStatement = $pdo->query("SELECT * FROM pessoa WHERE nome LIKE '%$pesquisa%' ");
                    while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){

                        $data_nascimento = $row['data_nascimento'];
                        $data_nascimento = setData($data_nascimento);
                        $cod_pessoa = $row['cod_pessoa'];
                        $nome = $row['nome'];
                        $endereco = $row['endereco'];
                        $telefone = $row['telefone'];

                        ListaPessoas($cod_pessoa,$nome,$endereco,$telefone,$data_nascimento);
                        ;}
                }else{
                $pdoStatement = $pdo->query("SELECT * FROM pessoa ");

                while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){

                    $data_nascimento = $row['data_nascimento'];
                    $data_nascimento = setData($data_nascimento);
                    $cod_pessoa = $row['cod_pessoa'];
                    $nome = $row['nome'];
                    $endereco = $row['endereco'];
                    $telefone = $row['telefone'];
                    
                    ListaPessoas($cod_pessoa,$nome,$endereco,$telefone,$data_nascimento);

                ;
            }}
                
                ?>
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>
            <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmação de exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='excluir_script.php' method='POST'>
        <p>Deseja realmente excluir</p>
        <p id='nome_pessoa'>nome do usuario</p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <input type='hidden' name='id' id='cod_pessoa' value=''>
            <input type='hidden' name='nome_apag' id='nome_apag' value=''>
            <input type="submit" class="btn btn-danger"value='Sim'>
        </form>
      </div>
    </div>
  </div>
</div>

    <script type='text/javascript'>
        function get_data(id, nome){
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('cod_pessoa').value = id;
            document.getElementById('nome_apag').value = nome;

        }
    </script>
    



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