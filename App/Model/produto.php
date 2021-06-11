<?php

namespace App\Model;

use App\Core\Model;

class produto{
    public $id;
    public $descricao;
    public $quantidade;
    public $peso;
    public $tamanho;
    public $cor;
    public $valor;
    public $imagem;
    public $desconto;

    private $conexao;

    public function getConexao(){
        $this->conexao = new \PDO("mysql:host=localhost;port=3306;dbname=icatalogo;", "root", "bcd127");
    
        return $this->conexao;
    }


    public function listarTodos(){
        $sql = " SELECT p.*, c.descricao as categoria FROM tbl_produto p
                 INNER JOIN tbl_categoria c ON p.categoria_id = c.id ORDER BY p.id DESC ";

        //preparamos a consulta
        $stmt = $this->getConexao()->prepare($sql);
        //executamos a consulta
        $stmt->execute();

        //verificamos a quantidade de linhas
        if($stmt->rowCount() > 0){
            //pegamos os resultados em forma de lista de objetos
            $resultado = $stmt->fetchAll(\PDO::FETCH_OBJ);

            //retornamos o resultado
            return $resultado;
        }else{
            return [];
        }
    }
}
?>