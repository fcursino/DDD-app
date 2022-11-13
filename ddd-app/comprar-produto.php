<?php

use Loja\Arquitetura\Venda\Aplicacao\Produto\ComprarProduto;
use Loja\Arquitetura\Venda\Aplicacao\Produto\ComprarProdutoDto;
use Loja\Arquitetura\Shared\Dominio\Pedido\LogDePedidoFechado;
use Loja\Arquitetura\Operacional\Dominio\Encomenda\LogDeEncomendaEnviada;
use Loja\Arquitetura\Shared\Infra\Pedido\RepositorioDePedidoEmMemoria;
use Loja\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;

require 'vendor/autoload.php';

$produto = $argv[1];
$preco = $argv[2];

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDePedidoFechado());
$publicador->adicionarOuvinte(new LogDeEncomendaEnviada());

$bancoDePedidos = new RepositorioDePedidoEmMemoria();
$useCase = new ComprarProduto($bancoDePedidos, $publicador);

$useCase->comprar(new ComprarProdutoDto($produto, $preco));
