<?php 

declare(strict_types = 1);

namespace Interfaces;

interface Pipeline extends Command
{
    public function addDecorator(Decorator $decorator) : void;
}


