<?php

    include('../model/usuario.php');
    include('../database/connection.php');

    
    class UsuarioController{
        
        public function salvar(Usuario $user) {
            
            $pdo = Database::conexao();

            try {

                $sql = "INSERT INTO `usuario`(`nome`, `email`, `senha`) VALUES (:nome, :email, :senha)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array (
                    ':nome' => $user->nome,
                    ':email' => $user->email,
                    ':senha' => $user->senha
                ));

                echo "Salvo";

            } catch (PDOException $th) {
                $th->getMessage();
            }
        }

        public function validarLogin($email, $senha) {
            $pdo = Database::conexao();

            try {

                $sql = "SELECT * FROM `usuario` WHERE email = '" .$email. "' and senha = '".$senha."'";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $user = new Usuario();
                    $user->id = $row['id'];
                    $user->nome = $row['nome'];
                    $user->email = $row['email'];
                    $user->senha = $row['senha'];

                    return $user;
                }

                return null;

            } catch (PDOException $th) {
                $th->getMessage();
            }
        
        
        }

    }
