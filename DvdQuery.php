<?php

namespace Database\Query;

require './Database.php';

class DvdQuery extends \Database {

  private $title;
  private $sql2;
  private $sql;

  public function titleContains ($title) {
    $this->title = $title;
  }

  public function orderByTitle () {
    $this->sql2 = "
    ORDER BY dvds.title
    ";

  }

  public function find() {

    $this->sql = "
    SELECT dvds.title, dvds.id, ratings.rating_name
    FROM dvds
    INNER JOIN ratings
    ON dvds.rating_id = ratings.id
    WHERE title LIKE ?
    ";

     if($this->sql2){
       $this->sql .=$this->sql2;
     }
    $like = "%".$this->title."%";

    $statement = self::$pdo->prepare($this->sql);
    $statement->bindParam(1, $like);
    $statement->execute();
    $result = $statement->fetchAll(\PDO::FETCH_OBJ);
    return $result;
  }



}
