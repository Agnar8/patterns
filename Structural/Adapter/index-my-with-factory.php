<?php

/**
 *  Два класса ниже мы не можем менять. В классах разные форматы и разные имена методов получения данных
 *  Задача вывести в виде массива полученные данные.
 */

class JsonReport
{
    public function get(): string
    {
        return '{"report":"json report"}';
    }
}

class SerializeReport
{
    public function getting(): string
    {
        return 'a:2:{i:0;s:12:"Sample array";i:1;a:2:{i:0;s:5:"Apple";i:1;s:6:"Orange";}}';
    }
}

// массов отчетов
$reports = [
    new JsonReport(),
    new SerializeReport()
];

interface AdapterBase
{
    public function getData();
}

class JsonAdapter implements AdapterBase
{
    private $jsonReport;

    public function __construct(JsonReport $jsonReport)
    {
        $this->jsonReport = $jsonReport;
    }

    public function getData()
    {
        return json_decode($this->jsonReport->get(), true);
    }
}

class SerializeAdapter implements AdapterBase
{
    private $serializeReport;

    public function __construct(SerializeReport $serializeReport)
    {
        $this->serializeReport = $serializeReport;
    }

    public function getData()
    {
        return unserialize($this->serializeReport->getting());
    }
}

class Factory
{
    static function getReport($report): AdapterBase
    {
        if ($report instanceof JsonReport) {
            return new JsonAdapter($report);
        } elseif ($report instanceof SerializeReport) {
            return new SerializeAdapter($report);
        }

        throw new \Exception('Not valid report');
    }
}

foreach ($reports as $report) {
    print_r(Factory::getReport($report)->getData());
}



