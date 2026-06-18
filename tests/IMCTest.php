<?php
use PhpUnit\Framework\TestCase;
use App\IMC;

class ImcTest extends TestCase{
    public function testGetImc(){
        $imc = new IMC(81, 1.80);
        $resultado = $imc->calcular();
        
        $this->assertNotEmpty($resultado);
    }
}

?>