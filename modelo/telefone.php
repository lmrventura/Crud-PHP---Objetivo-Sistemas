<?php
class Telefone {

    private $id_cliente_telefone;
    private $telefone;
    private $conn;

    public function __construct(){
        $dataBase = new dataBase();
        $db = $dataBase->dbConnection();
        $this->conn = $db;
    }

    public function redirect($url){
        header("Location: $url");
    }

    public function create($telefone){
        try{
            $this->id_cliente_telefone = $telefone;
            $this->telefone = $telefone;
            
            $sql = "insert into cliente_telefone(id_cliente_telefone, telefone)
                    values(:telefone, :observacao)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":telefone", $this->id_cliente_telefone);
            $stmt->bindParam(":observacao", $this->telefone);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }finally{
            $this->conn = null;
        }
    }

    public function delete($id){
        try{
            $sql = "delete from telefone where id_cliente_telefone = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }finally{
            $this->conn = null;
        }
    }

    public function update($id_cliente_telefone, $telefone, $id){ 
        try{
            $sql = "UPDATE cliente SET
                    id_cliente_telefone = :id_cliente_telefone, 
                    telefone = :telefone
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_cliente_telefone", $id_cliente_telefone);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
            return $stmt;

        }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }finally{
            $this->conn = null;
        }
    }
}
?>