<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=empresa','daniel','08150615daniel');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
}catch(ATTR_ERRMODE $e){
    echo'error: '.$e->getMessage();
}

// $pdoStatement = $pdo->query("SELECT cod_pessoa, nome, endereco FROM pessoa ");
// 
// while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){
//     echo "<p>{$row['cod_pessoa']} {$row['nome']} {$row['endereco']}</p>";
// }

?>