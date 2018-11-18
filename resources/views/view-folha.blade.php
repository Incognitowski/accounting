<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body>
  <div class="flex bg-grey-lighter min-h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 flex-col items-center font-sans">

      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2 mb-12">
        <div class='flex mb-6'>
          <h1 class="text-grey-darkest">Relatório Folha de Pagamento</h1>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Nome do Funcionário
            </label>
            <input disabled value="{{ $funcionario->funcionario_nome }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Cargo do Funcionário
            </label>
            <input disabled value="{{ $funcionario->funcionario_cargo  }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Dependentes Financeiros
            </label>
            <input disabled value="{{ $funcionario->funcionario_dependentes }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" >
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Filhos (Menores de 14 anos)
            </label>
            <input disabled value="{{ $funcionario->funcionario_filhos_menores }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" >
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Adicional Insalubridade (%)
            </label>
            <input disabled value="{{ $funcionario->funcionario_insalubridade*100 }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Salário Base
            </label>
            <input disabled value="{{ $funcionario->funcionario_salario_base }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Status do Funcionário
            </label>
            <div class="relative">
              <select disabled class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                <option @if(!$funcionario->funcionario_inativo) selected @endif >Ativo</option>
                <option @if($funcionario->funcionario_inativo) selected @endif >Inativo</option>
              </select>
            </div>
          </div>

          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Situação INSS
            </label>
            <div class="relative">
              <select disabled class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                <option @if($funcionario->funcionario_recolhe_inss) selected @endif>Recolhe INSS nesta empresa.</option>
                <option @if(!$funcionario->funcionario_recolhe_inss) selected @endif>Recolhe INSS de outra empresa.</option>
              </select>
            </div>
          </div>

        </div>

        <div class="-mx-1 flex-col md:flex mb-6">
          <div class='flex mb-6'>
            <h1 class="text-grey-darkest">Vales do Mês</h1>
          </div>
          @if(count($vales)>0)
          <table>
            <thead class='border bg-grey-lighter'>
              <th class='border text-grey-darkest'>Data</th>
              <th class='border text-grey-darkest'>Valor</th>
            </thead>
            <tbody>
              @foreach($vales as $vale)
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>{{ $vale->readableDate() }}</td>
                <td class='border text-grey-darkest text-center'>{{ $vale->readableValue() }}</td>
              </tr>
              @endforeach
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'></td>
                <td class='border text-grey-darkest text-center'>Total: {{ $money_format($folha->valor_vales) }}</td>
              </tr>
            </tbody>
          </table>
          @else
          <div class='flex flex-row items-center justify-center pt-5'>
            <h3 class="text-grey-dark">Nenhum vale foi lançado nesta folha de pagamento.</h3>
          </div>
          @endif
        </div>

        <div class="-mx-1 flex-col md:flex mb-6">
          <div class='flex mb-6'>
            <h1 class="text-grey-darkest">Horas Extra</h1>
          </div>
          <table>
            <thead class='border bg-grey-lighter'>
              <th class='border text-grey-darkest'>Tipo</th>
              <th class='border text-grey-darkest'>Quantidade (Horas)</th>
              <th class='border text-grey-darkest'>Valor (R$)</th>
            </thead>
            <tbody>
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Hora Extra (50%)</td>
                <td class='border text-grey-darkest text-center'>{{ $folha->qtd_h_ex_50 }}</td>
                <td class='border text-grey-darkest text-center'>{{ $money_format($folha->valor_h_ex_50) }}</td>
              </tr>
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Hora Extra (100%)</td>
                <td class='border text-grey-darkest text-center'>{{ $folha->qtd_h_ex_100 }}</td>
                <td class='border text-grey-darkest text-center'>{{ $money_format($folha->valor_h_ex_100) }}</td>
              </tr>
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'></td>
                <td class='border text-grey-darkest text-center'></td>
                <td class='border text-grey-darkest text-center'>Total: {{ $money_format($folha->total_hora_extra) }}</td>
              </tr>
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'></td>
                <td class='border text-grey-darkest text-center'></td>
                <td class='border text-grey-darkest text-center'>DSR: {{ $money_format($folha->dsr) }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="-mx-1 flex-col md:flex mb-6">
          <div class='flex mb-6'>
            <h1 class="text-grey-darkest">Folha de Pagamento</h1>
          </div>
          <table>
            <thead class='border bg-grey-lighter'>
              <th class='border text-grey-darkest'>Relativo a:</th>
              <th class='border text-grey-darkest'>Acréscimo</th>
              <th class='border text-grey-darkest'>Desconto</th>
              <th class='border text-grey-darkest'>Salario</th>
            </thead>
            <tbody>
              @php

                $salario += $folha->salario_base;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Salário de Registro</td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->salario_base) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario += $folha->comissao;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Comissão</td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->comissao) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario += $folha->insalubridade;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Adicional Insalubridade ({{ $funcionario->funcionario_insalubridade*100 }}% Sal. Min.) </td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->insalubridade) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario += $folha->valor_h_ex_50;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Hora Extra (50%)</td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->valor_h_ex_50) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario += $folha->valor_h_ex_100;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Hora Extra (100%)</td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->valor_h_ex_100) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario += $folha->dsr;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>D.S.R.</td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->dsr) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Salário Base</td>
                <td class='border text-green-dark text-center'></td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario -= $folha->inss_valor;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>INSS ({{$folha->inss_faixa->aliquota*100}}%)</td>
                <td class='border text-green-dark text-center'></td>
                <td class='border text-red-dark text-center'>- {{ $money_format($folha->inss_valor) }}</td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario -= $folha->irrf_valor;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>IRRF ({{$folha->irrf_faixa->aliquota*100}}%)</td>
                <td class='border text-green-dark text-center'></td>
                <td class='border text-red-dark text-center'>- {{ $money_format($folha->irrf_valor) }}</td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario -= $folha->valor_vales;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Vales</td>
                <td class='border text-green-dark text-center'></td>
                <td class='border text-red-dark text-center'>- {{ $money_format($folha->valor_vales) }}</td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              @php

                $salario += $folha->salario_familia;

              @endphp
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Salário Família</td>
                <td class='border text-green-dark text-center'>+ {{ $money_format($folha->salario_familia) }}</td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>Salário Final</td>
                <td class='border text-green-dark text-center'></td>
                <td class='border text-red-dark text-center'></td>
                <td class='border text-blue-dark text-center'>{{ $money_format($salario) }}</td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
</body>

</html>


