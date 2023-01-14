<?php

abstract class Code
{
    public function writeCode()
    {
        $developer = $this->getDeveloper();
        echo $developer->makeCode() . "\n";
    }

    //factory method
    abstract public function getDeveloper();
}

class PhpCode extends Code
{
    public function getDeveloper()
    {
        return new PhpDeveloper();
    }
}

class NodejsCode extends Code
{
    public function getDeveloper()
    {
        return new NodejsDeveloper();
    }
}

interface Developer
{
    public function makeCode();
}

class PhpDeveloper implements Developer
{
    public function makeCode()
    {
        echo "I write php code";
    }
}

class NodejsDeveloper implements Developer
{
    public function makeCode()
    {
        echo "I write nodejs code";
    }
}

(new PhpCode())->writeCode();
(new NodejsCode())->writeCode();
