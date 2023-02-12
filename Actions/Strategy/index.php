<?php
//Главная проверка осуществляется в методе payAmount() и в случае необходимости нужно будет изменить только его
interface payStrategy {
    public function pay($amount);
}

class payByCC implements payStrategy
{
    public function pay($amount = 0)
    {
        echo "Paying " . $amount . " using Credit Card\n";
    }

}

class payByPayPal implements payStrategy
{
    public function pay($amount = 0)
    {
        echo "Paying " . $amount . " using PayPal\n";
    }

}

class shoppingCart
{
    public $amount = 0;

    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    public function payAmount()
    {
        if ($this->amount >= 500) {
            $payment = new payByCC();
        } else {
            $payment = new payByPayPal();
        }

        $payment->pay($this->amount);
    }
}

$cart = new shoppingCart(499);
$cart->payAmount();

// Вывод: Paying 499 using PayPal

$cart = new shoppingCart(501);
$cart->payAmount();

//Вывод: Paying 501 using Credit Card
