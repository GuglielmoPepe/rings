<?php 

declare(strict_types = 1);

namespace Rings\Classes;

final class Next implements \Rings\Interfaces\Next
{
    private $command;
    private $queue;

    public function __construct(\Rings\Interfaces\Command $command, \SplQueue $queue)
    {
        $this->command = $command;
        $this->queue = $queue;
    }
    
    public function execute(\Rings\Interfaces\Data $data) : \Rings\Interfaces\Data
    {
        if ($this->queue->isEmpty())
        {
            return $this->command->execute($data);
        }
        
        $middleware = $this->queue->dequeue();
            
        return $middleware->execute($data, new Next($this->command, $this->queue));
    }
}

