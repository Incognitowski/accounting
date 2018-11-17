<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
  <script type='text/javascript'>
    $(document).ready(function(){

    });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter min-h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 flex-col items-center font-sans">

      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">

        <div class='flex mb-6'>
          <h1 class="text-grey-darkest">Emitir Folha de Pagamento</h1>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Nome do Funcionário
            </label>
            <input value="{{ $funcionario->funcionario_nome }}" disabled class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Cargo do Funcionário
            </label>
            <input value="{{ $funcionario->funcionario_cargo  }}" disabled class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Dependentes Financeiros
            </label>
            <input value="{{ $funcionario->funcionario_dependentes }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" disabled>
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Filhos (Menores de 14 anos)
            </label>
            <input value="{{ $funcionario->funcionario_filhos_menores }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" disabled>
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
            <input disabled value="{{ $funcionario->funcionario_salario_base }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" >
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Status do Funcionário
            </label>
            <div class="relative">
              <select disabled class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                <option value='false' @if(!$funcionario->funcionario_inativo) selected @endif >Ativo</option>
                <option value='true' @if($funcionario->funcionario_inativo) selected @endif >Inativo</option>
              </select>
            </div>
          </div>

          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
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
          @if(count($funcionario->monthVales())>0)
          <table>
            <thead class='border bg-grey-lighter'>
              <th class='border text-grey-darkest'>Data</th>
              <th class='border text-grey-darkest'>Valor</th>
            </thead>
            <tbody>
              @foreach($funcionario->monthVales() as $vale)
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'>{{ $vale->readableDate() }}</td>
                <td class='border text-grey-darkest text-center'>{{ $vale->readableValue() }}</td>
              </tr>
              @endforeach
              <tr class='border bg-grey-lighter'>
                <td class='border text-grey-darkest text-center'></td>
                <td class='border text-grey-darkest text-center'>Total: R$ {{ $funcionario->sumVales('pretty') }}</td>
              </tr>
            </tbody>
          </table>
          @else
            <div class='flex flex-row items-center justify-center pt-5'>
              <h3 class="text-grey-dark">Nenhum lançamento encontrado para os ultimos 30 dias</h3>
            </div>
          @endif
        </div>

      </div>

    </div>
  </div>
</body>

</html>


