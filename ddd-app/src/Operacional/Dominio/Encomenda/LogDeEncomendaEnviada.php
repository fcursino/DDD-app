<?php

namespace Loja\Arquitetura\Operacional\Dominio\Encomenda;

use Loja\Arquitetura\Shared\Dominio\Evento\Evento;
use Loja\Arquitetura\Operacional\Dominio\Encomenda\EncomendaEnviada;
use Loja\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class LogDeEncomendaEnviada extends OuvinteDeEvento
{
    /**
     * @param EncomendaEnviada
     */
    public function reagir(Evento $encomendaEnviada): void
    {
        fprintf(
            STDERR,
            'A encomenda do pedido com ticket "%s" já foi enviada para a nossa filial em %s!',
            (string) $encomendaEnviada->ticketEncomenda(),
            $encomendaEnviada->destinatarioEncomenda(),
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento instanceof EncomendaEnviada;
    }
}
