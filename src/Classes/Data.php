<?php 

declare(strict_types = 1);

namespace Rings\Classes;

class Data implements \Rings\Interfaces\Data
{
    protected $records;

    public function __construct(array $records = [])
    {
        $this->records = $records;
    }

    public function count() : int
    {
        return count($this->records);
    }

    public function getIterator() : \Traversable
    {
        return new \ArrayIterator($this->records);
    }

    public function jsonSerialize() : mixed
    {
        return $this->records;
    }

    public function offsetExists($offset) : bool
    {
        return isset($this->records[$offset]) ? TRUE : FALSE;
    }

    public function offsetGet($offset) : mixed
    {
        if ( ! isset($this->records[$offset]))
        {
            throw new \OutOfRangeException('The record ' . $offset . '  doesn\'t exists!');
        }

        return $this->records[$offset];
    }

    public function offsetSet($offset, $value) : void
    {
        throw new \RuntimeException('The method call not allowed!');
    }

    public function offsetUnset($offset) : void
    {
        throw new \RuntimeException('The method call not allowed!');
    }

    public function serialize() : ?string
    {
        return serialize($this->records);
    }

    public function unserialize($records) : void
    {
        $this->records = unserialize($records);
    }
    
    public function __serialize() : array
    {
        return $this->records;
    }

    public function __unserialize(array $records) : void
    {
        $this->records = $records;
    }
}

