<?php

    require("./vendor/autoload.php");

    use \App\Model\produto;

    $produtoModel = new produto();

   $lista = $produtoModel->listarTodos();

   foreach ($lista as $produto) {
       echo $produto->descricao;
   }
?>