<?php

namespace Loja\Arquitetura\Shared\Dominio\Pedido;
use Loja\Arquitetura\Venda\Dominio\Produto\Produto;
use Loja\Arquitetura\Shared\Dominio\Pedido\Ticket;

class Pedido
{
    private Produto $produto;
    private Ticket $ticket;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
        $this->ticket = new Ticket($this->gerarTicket());
    }

    public function produto(): string
    {
        return $this->produto;
    }

    public function ticket(): Ticket
    {
        return $this->ticket;
    }

    public function gerarTicket(): string
    {
        return $this->produto->produto().''.$this->produto->preco();
    }
}
