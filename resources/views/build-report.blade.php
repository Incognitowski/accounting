<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
  <script type='text/javascript'>
  $(document).ready(function(){

    var base = "{{ url('/relatorio') }}";
    var baseUrl = "{{ url('/relatorio') }}";

    $('#generate').on('click',function(){

      baseUrl = base;

      if($('#imobilizado').val()!==''){
        baseUrl = baseUrl + '/imobilizado/' + $('#imobilizado').val();
      }

      baseUrl = baseUrl + '/inicio/' + $('#data_inicio').val() + '/final/' + $('#data_final').val();

      window.location.replace(baseUrl);

    });

  });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter w-screen h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 items-start justify-center font-sans">
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        @csrf
        <div class='flex flex-col mb-6 border-b'>
          <h1 class="text-grey-darkest">Gerar Relatório</h1>
          <h4 class='text-grey-dark w-full py-3'>1. Data de início padrão é do começo do ano atual.</h4>
          <h4 class='text-grey-dark w-full pb-3'>2. Caso nenhum imobilizado seja selecionado, será lançado um relatório geral.</h4>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Imobilizado
            </label>
            <div class="relative">
              <select id='imobilizado' class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                <option value='' selected>Selecione um Imobilizado</option>
                @foreach($imobilizados as $imobilizado)
                <option value="{{ $imobilizado->imob_id }}">{{$imobilizado->imob_id}} - {{$imobilizado->imob_descricao}}</option>
                @endforeach
              </select>
              <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Data Início
            </label>
            <input type='date' id='data_inicio' value="{{ $data_inicio }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Data Final
            </label>
            <input type='date' id='data_final' value="{{ $data_final }}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
          <button id="generate" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Gerar Relatório</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
