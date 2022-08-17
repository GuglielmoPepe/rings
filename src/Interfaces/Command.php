<?php 

declare(strict_types = 1);

namespace Interfaces;

interface Command
{
    public function execute(Data $data) : Data;
}

