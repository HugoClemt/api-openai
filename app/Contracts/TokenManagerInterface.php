<?php 

namespace App\Contracts;

interface TokenManagerInterface
{
    public function createToken(array $payload);
}

?>