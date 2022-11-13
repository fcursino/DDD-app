<?php

namespace Loja\Arquitetura\Operacional\Dominio\Encomenda;

use Loja\Arquitetura\Shared\Dominio\Pedido\Ticket;
use Loja\Arquitetura\Operacional\Dominio\Encomenda\Encomenda;
use Loja\Arquitetura\Shared\Dominio\Evento\Evento;

class EncomendaEnviada implements Evento
{
    private Encomenda $encomenda;

    public function __construct(Encomenda $encomenda)
    {
        $this->encomenda = $encomenda;
    }

    public function ticketEncomenda(): Ticket
    {
        return $this->encomenda->ticketPedido();
    }

    public function destinatarioEncomenda(): string
    {
        return $this->encomenda->destinatario();
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
