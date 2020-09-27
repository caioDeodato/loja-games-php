<?php
    include('../model/compra.php');
    include('../model/usuario.php');
    include('../database/connection.php');
    include('../model/game.php');

    class CompraController {
        public function salvar($id_game, $id_usuario, $data_compra) {
            
            $pdo = Database::conexao();
    
            try {
    
                $sql = "INSERT INTO `compra`(`id_game`, `id_usuario`, `data_compra`) VALUES (:id_game, :id_usuario, :data_compra)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array (
                    ':id_game' => $id_game,
                    ':id_usuario' => $id_usuario,
                    ':data_compra' => $data_compra
                ));
    
                echo "Salvo";
    
            } catch (PDOException $th) {
                $th->getMessage();
            }
        }

        public function listarTodas($idUsuario) {
            $pdo = Database::conexao();

            $lista[] = new Compra();

            try {

                $sql = "SELECT * FROM `compra` WHERE id_usuario=$idUsuario ORDER BY id";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $compra = new Compra();
                    $compra->id = $row['id'];
                    $compra->id_game = $row['id_game'];
                    $compra->id_usuario = $row['id_usuario'];
                    $compra->data_compra = $row['data_compra'];
                    

                    array_push($lista, $compra);
                }

                if(!empty($lista)) {
                    return $lista;
                } else {
                    return null;
                }

            } catch (PDOException $th) {
                $th->getMessage();
            }
        }
    }