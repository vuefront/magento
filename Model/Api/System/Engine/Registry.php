<?php
namespace Vuefront\Vuefront\Model\Api\System\Engine;

class Registry
{
    private $data = [];

    public function get($key)
    {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }
}
