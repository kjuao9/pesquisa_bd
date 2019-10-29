<?php

//a classe pode ter propriedades e métodos
//as funções são como métodos
//e os private abaixo são propriedades
    class BD {
        private $con;
        private $host = "localhost";
        private $banco = "aula_fetch";
        private $usuario = "root";
        private $senha = "";

//construct: no momento que o bojeto é criado o método é chamado
//pdo está 'chamando' a conexão ao BD-- pdo é um driver de conexão do BD
        public function __construct() {
            $pdo = "mysql:host=" . $this ->host . ";dbname=" . $this->banco . ';charset=utf8';
//todo o código que está no try, se der erro não para o programa, o erro vai ser capturado e irá p/ o catch
//o código abaixo vai conectar ao BD, e se der erro vai mostrar no catch
            try {
                //this: variavel do metodo
                $this->con = new PDO($pdo, $this->usuario);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                #echo "Conectado com sucesso ao DB.";
            } catch(PDOException $e){
                //se pegar algum erro, capture e mostre a mensagem
                echo "Falha ao conectar no BD: " . $e->getMessage(); 
            }
        }

        public function todosDados(){
            $sql = "SELECT nome FROM nomes";
            $pdo = $this->con->prepare($sql);
            $pdo->execute();
            $dados = $pdo->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }
        
        public function pesquisarDados($nome){
            $sql = 'SELECT nome FROM nomes WHERE nome LIKE "%' . $nome . '%"';
            $pdo = $this->con->prepare($sql);
            $pdo->execute();
            $dados = $pdo->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }
    }

 ?>   