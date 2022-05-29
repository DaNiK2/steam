<?php

namespace App\Controller;
use Core\View;
use App\Service\DataBuilder;
use App\Model\GameModel;

class OrderController {
    use DataBuilder;

    public $orderPrice;
    public $price = 0;
   
    public function getOrder()
    {
        var_dump($_POST);
/*         foreach ($_POST as $key => $value) {
           $this->price = (int)$key;        
        } */   

        //return $this->сomparisonPriceBalance();

        //echo json_encode(array_shift($result));
        //echo json_encode($result);
    }


    /*public function сomparisonPriceBalance() {
        $expense = new ExpenseController();
        $balance = $expense->get($_SESSION['sid'])->balance;
        var_dump($this->price);
        if((int)$balance < $this->price){
            var_dump("Денег нема");
        }else{ return $expense->dataPreparation($this->price, '-', 2, $_POST['user'])};
        
    }*/

   /* public function getInformationForOrder()
    {
        $explodeKeys = explode(',', $this->orderKeys);

        $result = [];

        foreach ($explodeKeys as $key => $item) {
            $game = new GameModel();
            $game = $game->find($item);
            $result[$key] = $game;
    }    

    return $result;

    }
*/
}
