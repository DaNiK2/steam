<?php

namespace App\Controller;
use Core\View;
use App\Service\DataBuilder;
use App\Model\OrderModel;

class OrderController {
    use DataBuilder;

    public $game_id = 0;
    public $price = 0;
    public $count = 0;
   
    public function getOrder()
    {
        $test = ['id' => 1, 'count' => 1, 'finalPrice' => 1];
        $this->price = $test['finalPrice'];
        $this->game_id = $test['id'];
        $this->count = $test['count'];

        //return $this->сomparisonPriceBalance();
        return $this->store();

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

    public function store()
    {
        $data = [
            'final_price' => (int) $this->game_id,
            'count' => (int) $this->price,
            'order_date' => date('Y-m-d H:i:s', time()),
            'user_id' => (int) $_SESSION['sid'],
            'game_id' => (int) $this->game_id
        ];

        $args = $this->dataBuilder($data);
        
        $order = new OrderModel();
        $order->store($args);
    }
}
