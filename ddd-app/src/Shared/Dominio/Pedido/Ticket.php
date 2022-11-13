<?php

namespace Loja\Arquitetura\Shared\Dominio\Pedido;

class Ticket
{
    private string $hash;

    public function __construct(string $hash)
    {
        $this->verificarHash($hash);
    }

    private function verificarHash(string $hash): void
    {
        if (!preg_match('~[1-9]+~', $hash)) {
            throw new \InvalidArgumentException('Produto ou preço inválido');
        }

        $this->hash = $hash;
    }

    public function __toString(): string
    {
        return $this->hash;
    }
}
