<?php
    include('../model/compra.php');
    include('../model/usuario.php');
    include('../database/connection.php');
    include('../model/game.php');

    class CompraController {
        public function salvar($id_game, $id_usuario, $data_compra) {
            
            $pdo = Database::conexao();
    
            try {
    
                $sql = "INSERT INTO `compra`(`id_jogo`, `id_usuario`, `data_compra`) VALUES (:id_game, :id_usuario, :data_compra)";
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

                $sql = "SELECT * FROM `compra` WHERE id_usuario=$idUsuario ORDER BY id_compra";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $compra = new Compra();
                    $compra->id = $row['id_compra'];
                    $compra->id_game = $row['id_jogo'];
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

        public function listarGamesComprados($idUsuario) {
            $pdo = Database::conexao();

            $lista[] = new Game();

            try {

                $sql = "SELECT * FROM games INNER JOIN compra ON compra.id_jogo = games.id_game INNER JOIN usuario ON usuario.id = compra.id_usuario WHERE compra.id_usuario=$idUsuario";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $game = new Game();
                    $game->id = $row['id_game'];
                    $game->nome = $row['nome_game'];
                    $game->categoria = $row['categoria'];
                    $game->descricao = $row['descricao'];
                    $game->plataforma = $row['plataforma'];

                    array_push($lista, $game);
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