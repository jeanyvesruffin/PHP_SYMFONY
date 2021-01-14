<?php

namespace App\Service;

class ComplexObject
{
    protected string $foo;
    protected string $bar;
    protected string $baz;
    protected string $other;

    public function __construct(string $foo, string $bar, string $baz, string $other)
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->baz = $baz;
        $this->other = $other;
    }

    public function doSomething()
    {
        print_r('Service injecté');
    }
}
