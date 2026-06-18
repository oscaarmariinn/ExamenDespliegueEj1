<?php

namespace App;

class IMC
{
    private float $peso;
    private float $altura;

    /**
     * Constructor
     *
     * @param float $peso Peso en kilogramos
     * @param float $altura Altura en metros
     */
    public function __construct(float $peso, float $altura)
    {
        $this->peso = $peso;
        $this->altura = $altura;
    }

    /**
     * Calcula el IMC
     *
     * Fórmula: .,s
     * IMC = peso / (altura²)
     *
     * @return float
     */
    public function calcular(): float
    {
        if ($this->altura <= 0) {
            throw new \Exception("La altura debe ser mayor que cero.");
        }

        return $this->peso / ($this->altura * $this->altura);
    }

    /**
     * Devuelve la clasificación del IMC
     *
     * @return string
     */
    public function clasificacion(): string
    {
        $imc = $this->calcular();

        if ($imc < 18.5) {
            return "Bajo peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidad";
        }
    }
}