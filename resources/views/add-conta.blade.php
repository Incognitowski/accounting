<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type='text/javascript'>
    $(document).ready(function(){

        $('#superConta').change(function(){

            if($(this).val()!==''){
                $('#codigoConta').val($( "#superConta option:checked" ).data('codigo')+'.');
            }else{
                $('#codigoConta').val('');
            }

        });


    });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter w-screen">

    @include('components.sidebar')

    <div class="h-screen w-full flex items-start justify-center font-sans">
      <div class="bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='flex mb-6'>
          <h1 class="text-grey-darkest">Cadastrar Nova Conta</h1>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Descrição da conta
            </label>
            <input name='descricao' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Grupo de Conta 
            </label>
            <div class="relative">
              <select name='superConta' id='superConta' required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                <option value='' selected>Selecione uma conta</option>
                @foreach($contas as $conta)
                    <option value='{{ $conta->conta_id }}' data-codigo='{{ $conta->conta_codigo }}'>{{$conta->conta_codigo}} - {{$conta->conta_descricao}}</option>
                @endforeach
              </select>
              <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Código da conta
            </label>
            <input type='text' name='codigoConta' id='codigoConta' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
          <button class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Cadastrar</button>
        </div>

      </div>
    </div>
  </div>
</body>
</html>

