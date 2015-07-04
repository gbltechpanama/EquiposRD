<?php

namespace erd;

class PruebasGrafica
{
    
    public function miFuncion()
    {
        $variable1 = 10;
        $miVariable = 2;

        $suma = $variable1 + $miVariable;

        echo $suma;
    }
    
    private function funcionPrivada()
    {
        $miVariable = 22;
        echo "aqui va la variable";
        echo "aqui va la variable xxx";
       
    }
}
