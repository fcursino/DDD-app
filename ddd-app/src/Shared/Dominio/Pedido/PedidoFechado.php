<?php

namespace Loja\Arquitetura\Shared\Dominio\Pedido;

use Loja\Arquitetura\Shared\Dominio\Pedido\Ticket;
use Loja\Arquitetura\Shared\Dominio\Evento\Evento;

class PedidoFechado implements Evento
{
    private Ticket $ticketPedido;

    public function __construct(Ticket $ticketPedido)
    {
        $this->ticketPedido = $ticketPedido;
    }

    public function ticketPedido(): Ticket
    {
        return $this->ticketPedido;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
