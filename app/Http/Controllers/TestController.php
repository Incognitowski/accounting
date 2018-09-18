<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Conta as Conta;
use App\Imobilizado as Imobilizado;

class TestController extends Controller
{
    public function conta()
    {
        $contas = Conta::all();
    }

    public function imobilizado(){
        $imob = new Imobilizado();
        $imob->imob_descricao = "Carro Celta Azul";
        $imob->imob_dados = "{very nice json object, sweet}";
        $imob->imob_depreciavel = true;
        $imob->imob_vida_util = 10;
        $imob->imob_ativo = true;
        $imob->imob_valor = 25000;
        $imob->imob_aquisicao = "2018/07/13";

        $imob->save();

        $taxa = $imob->getDepreciabilityRate();
        
        echo "<br>";
        echo "Taxa de depreciabilidade anual: " . $taxa*365 . "<br>";
        echo "Taxa de depreciabilidade diária: " . $taxa . "<br>";
        echo "Preço de compra do imobilizado: " . $imob->imob_valor . "<br>";

        $valor = $imob->imob_valor;
        $dias = 365 * 2;
        for ($i=0; $i < $dias; $i++){
            $valor = $valor - ($valor*$taxa);    
        }

        $valor_depreciado = $imob->imob_valor - $valor;

        echo "Valor após " . $dias . " dias: " . $imob->roundValue($valor) . "<br>";
        echo "Depreciação foi de: " . $imob->roundValue($valor_depreciado) . "<br>";

        $imob->delete();

    }
}
