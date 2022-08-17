<?php 

declare(strict_types = 1);

namespace Classes;

final class Next implements \Interfaces\Next
{
    private $command;
    private $queue;

    public function __construct(\Interfaces\Command $command, \SplQueue $queue)
    {
        $this->command = $command;
        $this->queue = $queue;
    }
    
    public function execute(\Interfaces\Data $data) : \Interfaces\Data
    {
        if ($this->queue->isEmpty())
        {
            return $this->command->execute($data);
        }
        
        $middleware = $this->queue->dequeue();
            
        return $middleware->execute($data, new Next($this->command, $this->queue));
    }
}
