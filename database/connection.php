<?php 

    class Database {

        protected static $pdo;

        public function __construct()
        {
            $db_host = "";
            $db_name = "";
            $db_port = '';
            $db_usuario = "";
            $db_senha = "";
            $db_driver = "";

            try {
                self::$pdo = new PDO("$db_driver:host=$db_host; port=$db_port; dbname=$db_name", $db_usuario, $db_senha);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {

                die("Erro de conexão: ".$e->getMessage()); 
            }
        }

        public static function conexao()
        {
            # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
            if (!self::$pdo)
            {
                new Database();
            }

            # Retorna a conexão.
            return self::$pdo;
        }
    }

?>
