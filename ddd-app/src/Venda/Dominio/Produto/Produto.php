<?php

namespace Loja\Arquitetura\Venda\Dominio\Produto;

class Produto
{
    private string $produto;
    private string $preco;

    public function __construct(string $produto, string $preco)
    {
        $this->produto = $produto;
        $this->preco = $preco;
    }

    public function produto(): string
    {
        return $this->produto;
    }

    public function preco(): string
    {
        return $this->preco;
    }
}
