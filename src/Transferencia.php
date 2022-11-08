<?php

namespace App;

use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class Transferencia
{

    private Usuario $usuarioRecebedor;
    private Usuario $usuarioPagador;
    private float $valor;
    private string $nummeroTransacao;

    public function __construct(float $valor, Usuario $usuarioPagador, Usuario $usuarioRecebedor)
    {
        $this->nummeroTransacao = rand(1, 9999);
        $this->valor = $valor;
        $this->usuarioPagador = $usuarioPagador;
        $this->usuarioRecebedor = $usuarioRecebedor;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function transferir()
    {
        $this->sacar($this->valor, $this->usuarioPagador);
        $this->depositar($this->valor, $this->usuarioRecebedor);
    }

    public function depositar(float $value, Usuario $usuario)
    {
        $saldoUsuario = $usuario->saldo;
        $novoSaldo = $saldoUsuario + $value;
        $usuario->saldo = $novoSaldo;
    }

    public function sacar(float $value, Usuario $usuario)
    {
        $saldoUsuario = $usuario->saldo;
        $novoSaldo = $saldoUsuario - $value;
        if ($novoSaldo < 0) {
            throw new \Exception('Saldo insuficiente');
        }
        $usuario->saldo = $novoSaldo;
    }
}
