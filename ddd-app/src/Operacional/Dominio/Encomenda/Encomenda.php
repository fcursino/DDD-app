<?php

namespace Loja\Arquitetura\Operacional\Dominio\Encomenda;

use Loja\Arquitetura\Shared\Dominio\Pedido\Ticket;

class Encomenda
{
    private string $destinatario;
    private Ticket $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->destinatario = 'São José dos Campos - SP';
        $this->ticket = $ticket;
    }

    public function ticketPedido(): Ticket
    {
        return $this->ticket;
    }

    public function destinatario(): string
    {
        return $this->destinatario;
    }
}
