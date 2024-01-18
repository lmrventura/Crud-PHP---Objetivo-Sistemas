<?php
    require_once 'conexao.php';

    class Cliente{
        public $nome;
        public $telefone;
        public $observacao;
        
        private $conn;

        public function __construct()
        {
            $dataBase = new dataBase();
            $db = $dataBase->dbConnection();
            $this->conn = $db;
        }

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }
        
        public function read() {
            try {
                $query = "select * from cliente";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $clientes;
            }catch(PDOEXception $e){
                echo("Error: ".$e->getMessage());
            }
        }
        
        public function create($nome, $observacao){
            try{
                $this->nome = $nome;
                $this->observacao = $observacao;
                
                $sql = "insert into cliente(nome, cliente_telefone_id_cliente_telefone, observacao)
                        values(:nome, :telefone, :observacao)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":nome", $this->nome);
                $stmt->bindParam(":telefone", $this->telefone);
                $stmt->bindParam(":observacao", $this->observacao);
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
                $sql = "delete from cliente where id = :id";
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

        public function update($nome, $telefone, $observacao, $id){ 
            try{
                $sql = "UPDATE cliente SET
                        nome = :nome,
                        cliente_telefone_id_cliente_telefone = :telefone,
                        observacao = :observacao
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":telefone", $telefone);
                $stmt->bindParam(":observacao", $observacao);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }
        
        public function redirect($url){
            header("Location: $url");
        }

    }

?>