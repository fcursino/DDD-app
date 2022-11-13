<?php

namespace Loja\Arquitetura\Shared\Infra\Pedido;

use Loja\Arquitetura\Shared\Dominio\Pedido\Pedido;
use Loja\Arquitetura\Shared\Dominio\Pedido\RepositorioDePedido;

class RepositorioDePedidoEmMemoria implements RepositorioDePedido
{
    private array $pedidos = [];

    public function adicionar(Pedido $pedido): void
    {
        $this->pedidos[] = $pedido;
    }

    public function buscarPedido(): Pedido
    {
        return $this->pedidos[0];
    }
}
