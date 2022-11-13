<?php

namespace Loja\Arquitetura\Shared\Dominio\Pedido;

use Loja\Arquitetura\Shared\Dominio\Evento\Evento;
use Loja\Arquitetura\Shared\Dominio\Pedido\PedidoFechado;
use Loja\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class LogDePedidoFechado extends OuvinteDeEvento
{
    /**
     * @param PedidoFechado
     */
    public function reagir(Evento $pedidoFechado): void
    {
        fprintf(
            STDERR,
            'O pedido com o ticket "%s" foi fechado! Logo mais a encomenda será montada...',
            (string) $pedidoFechado->ticketPedido(),
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento instanceof PedidoFechado;
    }
}
