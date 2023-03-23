<?php 

declare(strict_types = 1);

namespace Rings\Classes;

final class Pipeline implements \Rings\Interfaces\Pipeline
{
    private $queue;
    
    public function __construct(\SplQueue $queue)
    {
        $this->queue = $queue;
    }
    
    public function addDecorator(\Rings\Interfaces\Decorator $decorator) : void 
    {
        $this->queue->enqueue($decorator);

        return;
    }
    
    public function execute(\Rings\Interfaces\Data $data) : \Rings\Interfaces\Data
    {
        $next = new Next($this->command, $this->queue);
        
        return $next->execute($data);
    }
}

