<?php 

declare(strict_types = 1);

namespace Classes;

class Command implements \Interfaces\Command
{
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function execute(\Interfaces\Data $data) : \Interfaces\Data
    {
        return call_user_func($this->callback, $data);
    }
}

