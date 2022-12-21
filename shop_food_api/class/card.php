<?php
class Card{
    private $conn;
    private $db_table="food_card";
    //model
    public $Card_ID;
    public $Food_ID;

    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery="SELECT card_id, foods.Food_Name, foods.Food_Img, foods.Food_Price FROM food_card, foods where food_card.food_id = foods.Food_ID";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }      
}
?>