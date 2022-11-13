<?php

namespace Loja\Arquitetura\Operacional\Aplicacao\Encomenda;

use Loja\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
use Loja\Arquitetura\Shared\Dominio\Pedido\RepositorioDePedido;
use Loja\Arquitetura\Operacional\Dominio\Encomenda\EncomendaEnviada;
use Loja\Arquitetura\Operacional\Dominio\Encomenda\Encomenda;

class EnviarEncomenda
{
    private RepositorioDePedido $repositorioDePedido;
    private PublicadorDeEvento $publicador;

    public function __construct(PublicadorDeEvento $publicador, RepositorioDePedido $repositorioDePedido)
    {
        $this->repositorioDePedido = $repositorioDePedido;
        $this->publicador = $publicador;
    }

    public function enviar(): void
    {
        $pedido = $this->repositorioDePedido->buscarPedido();

        $evento = new EncomendaEnviada(new Encomenda($pedido->ticket()));
        $this->publicador->publicar($evento);
    }
}
