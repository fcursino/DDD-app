<?php

namespace Loja\Arquitetura\Shared\Dominio\Evento;

abstract class OuvinteDeEvento
{
    public function processa(Evento $evento): void
    {
        if ($this->sabeProcessar($evento)) {
            $this->reagir($evento);
        }
    }

    abstract public function sabeProcessar(Evento $evento): bool;
    abstract public function reagir(Evento $evento): void;
}
