<?php
namespace Mycompany\Test\Model;
use Mycompany\Test\Api\TestInterface;
 
class Test implements TestInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function fullname($name) {
        return "Hi, " . $name;
    }
}
