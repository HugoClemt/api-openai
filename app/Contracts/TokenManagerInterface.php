<?php 

namespace App\Contracts;

interface TokenManagerInterface
{
    public function createToken(array $payload);

    public function checkToken(string $token);
}

?>