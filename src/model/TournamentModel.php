<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class TournamentModel extends Model{




    public function findAll()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `tournament`');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    

    
}