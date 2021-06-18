<?php

session_start();

use App\Core\Controller;

class Categorias extends Controller{

    public function index(){

        $categoriaModel = $this->model("Categoria");

        $categorias = $categoriaModel->listarTodas();

        $this->view("categorias/index", $categorias);

    }

    public function update($id){
        // implementar a atualizações dos dados
    }

    public function create(){

        $this->view("categorias/create");

    }

    public function store(){
        
        $erros = $this->validarCampos();

        if(count($erros) > 0){
            $_SESSION["erros"] = $erros;

            header("location: /categorias/create");

            exit();
        }

        //instanciamos uma categoria model
        $categoriaModel = $this->model("Categoria");
        
        //Atribuimos a ela a descrição a ser inserida
        $categoriaModel->descricao = $_POST["descricao"];

        //Chamamos o método de inserir que retorna a classe alterada já com o id inserido
        $categoriaModel = $categoriaModel->inserir();

        //Deu certo a inserção ?
        if ($categoriaModel) {
            $_SESSION["mensagem"] = "Categoria cadastrada com sucesso";
        } else {
            $_SESSION["mensagem"] = "Problemas ao cadastrar a categoria";
        }

        //Redirecionamos para a tela de listagem (index)
        header("location: /categorias");
    
    }

    public function edit($id){

        $categoriaModel = $this->model("Categoria");

        $categoriaModel = $categoriaModel->buscarPorId($id);

        $this->view("/categorias/edit", $categoriaModel);
        
    }

    public function destroy($id){

        $categoriaModel = $this->model("Categoria");

        $categoriaModel->id = $id;

        if($categoriaModel->deletar()){
            $_SESSION["mensagem"] = "Categoria excluída com sucesso";
        }else{
            $_SESSION["mensagem"] = "Problemas ao excluir categoria";
        }

        header("location: /categorias");
    }


    private function validarCampos(){
        $erros = [];
      
        if(!isset($_POST["descricao"]) || $_POST["descricao"] == ""){
          $erros[] = "O campo descrição é obrigatório";
        }
      
        return $erros;
    }

}

