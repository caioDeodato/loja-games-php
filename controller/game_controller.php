<?php

    include('../model/game.php');
    include('../database/connection.php');

    class GameController {

        public function listarTodos() {
            $pdo = Database::conexao();

            $lista[] = new Game();

            try {

                $sql = "SELECT * FROM `games` ORDER BY nome_game";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $game = new Game();
                    $game->id = $row['id_game'];
                    $game->nome = $row['nome_game'];
                    $game->categoria = $row['categoria'];
                    $game->preco = $row['preco'];
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

        public function listarPorCategoria($categoria) {
            $pdo = Database::conexao();

            $lista[] = new Game();

            try {

                $sql = "SELECT * FROM `games` WHERE categoria='$categoria' ORDER BY nome";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $game = new Game();
                    $game->id = $row['id_game'];
                    $game->nome = $row['nome_game'];
                    $game->categoria = $row['categoria'];
                    $game->preco = $row['preco'];
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