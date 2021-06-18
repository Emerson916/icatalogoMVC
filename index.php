<?php

    require("./vendor/autoload.php");

    use \App\Model\Produto;

    $produtoModel = new Produto();

   $lista = $produtoModel->listarTodos();

   foreach ($lista as $produto) {
       echo $produto->descricao;
   }
?>