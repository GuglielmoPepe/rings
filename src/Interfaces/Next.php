<?php 

declare(strict_types = 1);

namespace Rings\Interfaces;

interface Next extends Command
{
    public function __construct(Command $command, \SplQueue $queue);
}

