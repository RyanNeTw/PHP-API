<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class UserModel extends Model{




    public function findAll()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `users`');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllTournament()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `tournament`');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create(string $nickname, string $mail, string $password)
    {

        $statement = $this->pdo->prepare('INSERT INTO `users`(`nickname`, `mail`, `password` ) VALUES (:nickname, :mail, :password)');

        return $statement->execute([
            'nickname' => $nickname,
            'mail' => $mail,
            'password' => $password,
        ]);
    }

    public function createTournament(string $name, string $bio, int $maxPlayer)
    {

        $statement = $this->pdo->prepare('INSERT INTO `tournament`(`name`, `bio`, `maxPlayer` ) VALUES (:name, :bio, :maxPlayer)');

        return $statement->execute([
            'name' => $name,
            'bio' => $bio,
            'maxPlayer' => $maxPlayer,
        ]);
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        return $statement->execute([
            'id' => $id,
        ]);
    }

    public function deleteTournament(int $id)
    {
        $statement = $this->pdo->prepare('DELETE FROM tournament WHERE id = :id');
        return $statement->execute([
            'id' => $id,
        ]);
    }


    public function update(string $nickname, string $mail, string $password, int $id)
    {
        $statement = $this->pdo->prepare('UPDATE `users` SET nickname = :nickname, mail = :mail, password = :password WHERE id = :id');

        return $statement->execute([
            'nickname' => $nickname,
            'mail' => $mail,
            'password' => $password,
            'id' => $id,
        ]);
    }

    public function updateTournament(string $name, string $bio, int $maxPlayer, int $id)
    {
        $statement = $this->pdo->prepare('UPDATE `tournament` SET name = :name, bio = :bio, maxPlayer = :maxPlayer WHERE id = :id');

        return $statement->execute([
            'name' => $name,
            'bio' => $bio,
            'maxPlayer' => $maxPlayer,
            'id' => $id,
        ]);
    }


    public function joinTournament(int $user_id, int $tournament_id)
    {

        $statement = $this->pdo->prepare('INSERT INTO `participants` (`user_id`, `tournament_id`) VALUES (:user, :tournament_id)');

        return $statement->execute([
            'user' => $user_id,
            'tournament_id' => $tournament_id
        ]);
    }
    
}