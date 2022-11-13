<?php

namespace Loja\Arquitetura\Venda\Aplicacao\Produto;

class ComprarProdutoDto
{
    public string $produto;
    public string $preco;

    public function __construct(string $produto, string $preco)
    {
        $this->produto = $produto;
        $this->preco = $preco;
    }
}
