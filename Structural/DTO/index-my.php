<?php

/**
 * Тут любые входные данные, реквест или апи, как в данном случае
 * Апи которое возвращает статус и тип заказа массивом
 */
class RemoteOrderApi
{
    public static function getResult(): array
    {
        return ['order_id' => 123, 'type' => 'debit'];
    }
}

// может это не ок называть класс с приставкой DTO. Выглядит не очень
class OrderDTO
{
    // можно делать приватными и писать геетеры и сеттеры
    public $id;
    public $type;

    // вопрос, можно ли сюда включать валидацию данных?
    public function __construct(array $order)
    {
        $this->id = $order['order_id'];
        $this->type = $order['type'];
    }
}

class OrderStorage
{
    private $order;

    public function __construct(OrderDTO $orderDTO)
    {
        $this->order = $orderDTO;
    }

    public function save()
    {
        echo "I save order {$this->order->id} type {$this->order->type} \n";
    }
}

$order = new OrderDTO(RemoteOrderApi::getResult());
(new OrderStorage($order))->save();

// можно использовать на входе в приложение и на выходе из приложения
return $order;


