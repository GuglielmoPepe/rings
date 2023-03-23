<?php 

declare(strict_types = 1);

namespace Rings\Classes;

final class Next implements \Rings\Interfaces\Next
{
    private $queue;

    public function __construct(\SplQueue $queue)
    {
        $this->queue = $queue;
    }
    
    public function execute(\Rings\Interfaces\Data $data) : \Rings\Interfaces\Data
    {
        if ($this->queue->isEmpty())
        {
            return $data;
        }
        
        $decorator = $this->queue->dequeue();
            
        return $decorator->execute($data, new Next($this->queue));
    }
}

