<?php 

declare(strict_types = 1);

namespace Classes;

final class Pipeline implements \Interfaces\Pipeline
{
    private $command;
    private $queue;
    
    public function __construct(\Interfaces\Command $command, \SplQueue $queue)
    {
        $this->command = $command;
        $this->queue = $queue;
    }
    
    public function addDecorator(\Interfaces\Decorator $decorator) : void 
    {
        $this->queue->enqueue($decorator);

        return;
    }
    
    public function execute(\Interfaces\Data $data) : \Interfaces\Data
    {
        $next = new Next($this->command, $this->queue);
        
        return $next->execute($data);
    }
}

