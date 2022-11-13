<?php

namespace Loja\Arquitetura\Venda\Aplicacao\Produto;

use Loja\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
use Loja\Arquitetura\Shared\Aplicacao\Pedido\FecharPedido;
use Loja\Arquitetura\Shared\Dominio\Pedido\RepositorioDePedido;
use Loja\Arquitetura\Venda\Dominio\Produto\Produto;
use Loja\Arquitetura\Venda\Aplicacao\Produto\ComprarProdutoDto;
use Loja\Arquitetura\Operacional\Aplicacao\Encomenda\EnviarEncomenda;

class ComprarProduto
{
    private RepositorioDePedido $repositorioDePedido;
    private PublicadorDeEvento $publicador;

    public function __construct(RepositorioDePedido $repositorioDePedido, PublicadorDeEvento $publicador)
    {
        $this->repositorioDePedido = $repositorioDePedido;
        $this->publicador = $publicador;
    }

    public function comprar(ComprarProdutoDto $dados): void
    {
        $produto = new Produto($dados->produto, $dados->preco);

        $fechamentoDePedido = new FecharPedido($produto, $this->publicador, $this->repositorioDePedido);
        $fechamentoDePedido->fechar();

        $envioDeEncomenda = new EnviarEncomenda($this->publicador, $this->repositorioDePedido);
        $envioDeEncomenda->enviar();
    }
}
