<?php
    require_once 'conexao.php';
    
    class Cliente {
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

        public function readNumber($id_cliente) {
            try{
                $query = "select * from cliente_telefone where id_cliente_telefone = :id_cliente";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $telefone = $result[0]["telefone"];
                return $telefone;
            }catch(PDOEXception $e){
                echo("Error: ".$e->getMessage());
            }
        }
        
        public function create($nome, $observacao, $telefone){
            try{
                // $numeroAleatorio = random_int(PHP_INT_MIN, PHP_INT_MAX);

                        // Obtém o próximo valor para id_cliente usando a lógica de COALESCE e MAX
                $sqlNextId = "SELECT COALESCE(MAX(id_cliente), 0) + 1 AS next_id FROM cliente";
                $stmtNextId = $this->conn->prepare($sqlNextId);
                $stmtNextId->execute();
                $resultNextId = $stmtNextId->fetch(PDO::FETCH_ASSOC);
                $id = $resultNextId['next_id'];

                $this->nome = $nome;
                $this->observacao = $observacao;
                
                //o insert tem que vir antes porque a normalização do banco de dados tem uma foreign key na tabela cliente referenciando a tabela cliente_telefone

                $sqlTelefone = "insert into cliente_telefone(id_cliente_telefone, telefone) values(:id_cliente_telefone, :telefone)";
                $stmtTelefone = $this->conn->prepare($sqlTelefone);
                $stmtTelefone->bindParam(":id_cliente_telefone", $id);
                $stmtTelefone->bindParam(":telefone", $telefone);
                $stmtTelefone->execute();

                $sqlCliente = "insert into cliente(id_cliente, nome, observacao, cliente_telefone_id_cliente_telefone) values(:id_cliente, :nome, :observacao, :id_telefone)";
                $stmtCliente = $this->conn->prepare($sqlCliente);
                $stmtCliente->bindParam(":id_cliente", $id);
                $stmtCliente->bindParam(":nome", $this->nome);
                $stmtCliente->bindParam(":observacao", $this->observacao);
                $stmtCliente->bindParam(":id_telefone", $id);
                $stmtCliente->execute();

                return $stmtCliente;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function createNumber($telefone) {
            try{
                // Obtém o próximo valor para id_cliente usando a lógica de COALESCE e MAX
                $sqlNextId = "SELECT COALESCE(MAX(id_cliente), 0) AS last_id FROM cliente";
                $stmtNextId = $this->conn->prepare($sqlNextId);
                $stmtNextId->execute();
                $resultNextId = $stmtNextId->fetch(PDO::FETCH_ASSOC);
                $id = $resultNextId['last_id'];
    
                $sql = "insert into cliente_telefone(id_cliente_telefone, telefone) values( :id_cliente_telefone, :telefone)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id_cliente_telefone", $id);
                $stmt->bindParam(":telefone", $telefone);
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function delete($id_cliente){
            try{
                $sql = "delete from cliente where id_cliente = :id_cliente";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id_cliente", $id_cliente);
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