<?php

namespace Loja\Arquitetura\Shared\Aplicacao\Pedido;

use Loja\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
use Loja\Arquitetura\Shared\Dominio\Pedido\RepositorioDePedido;
use Loja\Arquitetura\Shared\Dominio\Pedido\Pedido;
use Loja\Arquitetura\Shared\Dominio\Pedido\PedidoFechado;
use Loja\Arquitetura\Venda\Dominio\Produto\Produto;


class FecharPedido
{
    private RepositorioDePedido $repositorioDePedido;
    private Produto $produto;
    private PublicadorDeEvento $publicador;

    public function __construct(Produto $produto, PublicadorDeEvento $publicador, RepositorioDePedido $repositorioDePedido)
    {
        $this->produto = $produto;
        $this->publicador = $publicador;
        $this->repositorioDePedido = $repositorioDePedido;
    }

    public function fechar(): void
    {
        $pedido = new Pedido($this->produto);

        $this->repositorioDePedido->adicionar($pedido);

        $evento = new PedidoFechado($pedido->ticket());
        $this->publicador->publicar($evento);
        
    }
}
