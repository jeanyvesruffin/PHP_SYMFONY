<?php

namespace App\Service;

class ComplexObject
{
    protected $foo;
    protected $bar;
    protected $baz;
    protected $other;

    public function __construct($foo, $bar, $baz, $other)
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->baz = $baz;
        $this->other = $other;
    }

    public function doSomething()
    {
        return print_r('Objet injectée');
    }
}
