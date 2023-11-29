<?php

namespace App\Providers;

use Faker\Provider\Base;

class AngolanBiProvider extends Base
{
    /**
     * Gera um número de BI angolano fictício.
     *
     * @return string
     */
    public function angolanBi()
    {
        // Lógica para gerar um número de BI angolano fictício
        return 'A' . $this->randomNumber(6);
    }
}
    