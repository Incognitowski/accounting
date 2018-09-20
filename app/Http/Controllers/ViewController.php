<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;

class ViewController extends Controller
{
    public function imobilizado(){
        return view('manage-imobilizado');
    }

    public function addImobilizado(){
        return view('add-imobilizado');
    }

    public function conta(){
        $contas = Conta::all();
        return view('manage-conta',['contas'=>$contas]);
    }

    public function addConta(){
        $contas = Conta::orderBy('conta_codigo','desc')->get();
        return view('add-conta',['contas'=>$contas]);
    }
}
