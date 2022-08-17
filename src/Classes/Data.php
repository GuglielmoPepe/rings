<?php 

declare(strict_types = 1);

namespace Classes;

class Data implements \Interfaces\Data
{
    public function __construct(array $records = [])
    {
        $this->records = $records;
    }

    function count()
    {
        return count($this->records);
    }

    function getIterator()
    {
        return new \ArrayIterator($this->records);
    }

    function jsonSerialize()
    {
        return $this->records;
    }

    public function offsetExists($offset)
    {
        return isset($this->records[$offset]) ? TRUE : FALSE;
    }

    public function offsetGet($offset)
    {
        if ( ! isset($this->records[$offset]))
        {
            throw new \OutOfRangeException('The record ' . $offset . '  doesn\'t exists!');
        }

        return $this->records[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new \RuntimeException('The method call not allowed!');
    }

    public function offsetUnset($offset)
    {
        throw new \RuntimeException('The method call not allowed!');
    }

    function serialize()
    {
        return serialize($this->records);
    }

    function unserialize($records)
    {
        $this->records = unserialize($records);
    }
}

