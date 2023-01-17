### Dependency Injection
Внедрение зависимостей

Нужен для уменьшения связанности между классами

Если совсем обобщить, то это разница между Композицией и Агрегацией. Типа композиция это плохо, агрегация хорошо.

#### Композиция
<pre>
class App() {
    private $someService;

    function __construct() {
        $this->someService = new SomeService();
    }
} 
</pre>

#### Агрегация

<pre>
class App() {
    private $someService;

    function __construct(SomeService $someService) {
        $this->someService = $someService;
    }
} 
</pre>

Всего есть 3 типа иньекций зависимости. Рассмотренная выше - это внедрение через  конструктор.
Есть еще внедрение через setter метод и внедрение через публичное свойство класса.

#### метод
<pre>
class App() {
    private $someService;

    function setService(SomeService $someService) {
        $this->someService = $someService;
    }
} 
</pre>

#### свойство
<pre>
class App() {
    public $someService;
} 

$App = new App();
$app->service = new SomeService();
</pre>

Внедрение через конструктор - это лучший способ для подключения основных зависимостей, а вот внедрение через setter - для добавления дополнительных зависимостей

-----------------------------

### Service Container

Объект, который знает, как создавать и настраивать объекты. Чтобы выполнять свою работу, он должен знать об аргументах конструктора

самый простой пример

<pre>
class Container
{
  public function getSomeService()
  {
    return new Service('option1','option2');
  }
}

$container = new Container();
$service = $container->getSomeService();
</pre>

В ларавель сервис контейнера - это в appServerProvider.php

пример:
<pre>
$this->app->bind(FilterSenderService::class, function () {
    $filterSenderRepository = new FilterSenderRepository();
    return new FilterSenderService($filterSenderRepository);
});
</pre>

Т.е. теперь вместо того, чтобы писать код:

<pre>
$filterSenderRepository = new FilterSenderRepository();
$filerSenderService = new FilterSenderService($filterSenderRepository);
</pre>

пишем:
<pre>
$filterSenderService = \app()->make(FilterSenderService::class);
</pre>

1. меньше кода
2. все зависимости инициализируюся в одном месте
3. если понадобиться изменить, что-то то это просто сделать, потому, что см. п.2

Все зависимости модулей должны строятся на абстракциях этих модулях, а не их конкретных реализациях

кстати, лучше(иногда) передавать интерфейс в качестве типа зависимости, а не конкретный класс
в общем это управление Агрегацией

а не про Композицию 

https://www.kobzarev.com/programming/di/