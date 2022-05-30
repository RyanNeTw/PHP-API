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
    
    public function create(string $nickname, string $mail, string $password)
    {

        $statement = $this->pdo->prepare('INSERT INTO `users`(`nickname`, `mail`, `password` ) VALUES (:nickname, :mail, :password)');

        return $statement->execute([
            'nickname' => $nickname,
            'mail' => $mail,
            'password' => $password,
        ]);
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
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
    
}