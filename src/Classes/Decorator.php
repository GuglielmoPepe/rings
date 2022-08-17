<?php 

declare(strict_types = 1);

namespace Rings\Classes;

class Decorator implements \Rings\Interfaces\Decorator
{
    public function execute(\Rings\Interfaces\Data $data, \Rings\Interfaces\Next $next) : \Rings\Interfaces\Data
    {
        return $next->execute($data);
    }
}

