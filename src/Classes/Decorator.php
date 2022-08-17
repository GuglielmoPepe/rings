<?php 

declare(strict_types = 1);

namespace Classes;

class Decorator implements \Interfaces\Decorator
{
    public function execute(\Interfaces\Data $data, \Interfaces\Next $next) : \Interfaces\Data
    {
        return $next->execute($data);
    }
}

