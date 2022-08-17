<?php 

declare(strict_types = 1);

namespace Interfaces;

interface Decorator
{
    public function execute(Data $data, Next $next) : Data;
}


