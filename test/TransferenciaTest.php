<?php

class TransferenciaTest extends \PHPUnit\Framework\TestCase
{
    public function testSeQuantiaDeUsuarioRecebedorEAumentada()
    {

        $usuarioPagador = new \App\Usuario('Guilherme', 1500);
        $usuarioRecebedor = new \App\Usuario('Victor', 200);
        $transferencia = new \App\Transferencia(200, $usuarioPagador, $usuarioRecebedor);

        $transferencia->transferir();

        $this->assertEquals(400, $usuarioRecebedor->saldo);

    }

    public function testSeQuantiaDeUsuarioPagadorEDecerementada()
    {

        $usuarioPagador = new \App\Usuario('Guilherme', 1500);
        $usuarioRecebedor = new \App\Usuario('Victor', 200);
        $transferencia = new \App\Transferencia(1500, $usuarioPagador, $usuarioRecebedor);

        $transferencia->transferir();

        $this->assertEquals(0, $usuarioPagador->saldo);
    }

    public function testSeExceptionEGeradoCasoSaldoDoPagadorSejaMenorQueOValorASerTransferido()
    {

        $this->expectException(Exception::class);

        $usuarioPagador = new \App\Usuario('Guilherme', 1500);
        $usuarioRecebedor = new \App\Usuario('Victor', 200);
        $transferencia = new \App\Transferencia(1700, $usuarioPagador, $usuarioRecebedor);

        $transferencia->transferir();
    }

}