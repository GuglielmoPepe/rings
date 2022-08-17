<?php 

declare(strict_types = 1);

namespace Rings\Classes;

class Command implements \Rings\Interfaces\Command
{
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function execute(\Rings\Interfaces\Data $data) : \Rings\Interfaces\Data
    {
        return call_user_func($this->callback, $data);
    }
}

