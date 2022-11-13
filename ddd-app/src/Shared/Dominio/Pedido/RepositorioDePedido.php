<?php

namespace Loja\Arquitetura\Shared\Dominio\Pedido;


interface RepositorioDePedido
{
    public function adicionar(Pedido $pedido): void;
    /** @return Pedido */
    public function buscarPedido(): Pedido;
}
