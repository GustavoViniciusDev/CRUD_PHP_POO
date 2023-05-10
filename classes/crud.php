<?php
include('conexao/conexao.php');

$db = new Database();

class Crud{
    private $conn;
    private $table_name = "bandas";
    

    public function __construct($db){
        $this->conn = $db;
    }

    //funcao para criar registros
    public function create($postValues){
       
        $nome_banda = $postValues['nome_banda'];
        $genero = $postValues['genero'];
        $gravadora = $postValues['gravadora'];
        $num_discos = $postValues['num_discos'];
        $qtda_albuns = $postValues['qtda_albuns'];

        $query = "INSERT INTO ".$this->table_name . "(nome_banda, genero, gravadora, num_discos, qtda_albuns) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$nome_banda);
        $stmt->bindParam(2,$genero);
        $stmt->bindParam(3,$gravadora);
        $stmt->bindParam(4,$num_discos);
        $stmt->bindParam(5,$qtda_albuns);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //funcao para ler registros
    public function read(){
        $query = "SELECT * FROM ". $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //funcao para atualizar os registros
    public function update($id, $nome_banda,$genero, $gravadora, $num_discos,$qtda_albuns){
        $query = "UPDATE ". $this->table_name . " SET nome_banda = ?, genero = ?, gravadora = ?, num_discos = ?, qtda_albuns = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$nome_banda);
        $stmt->bindParam(2,$genero);
        $stmt->bindParam(3,$gravadora);
        $stmt->bindParam(4,$num_discos);
        $stmt->bindParam(5,$qtda_albuns);
        $stmt->bindParam(6,$id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    //funcao para deletar os registros
    public function delete($id){
        $query = "DELETE FROM ". $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}