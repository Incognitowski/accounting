<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="flex bg-grey-lighter w-screen">

    @include('components.sidebar')

    <div class="h-screen w-full flex items-start justify-center font-sans">
      <div class="bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='flex mb-6'>
          <h1 class="text-grey-darkest">Cadastrar Novo Imobilizado</h1>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Descrição
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Data de Aquisição
            </label>
            <input type='date' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Valor
            </label>
            <input type='number' step='0.01' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6 pb-6 border-b border-grey">
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Depreciação
            </label>
            <div class="relative">
              <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                <option value='true' selected>Depreciável</option>
                <option value='false'>Não Depreciável</option>
              </select>
              <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Vida Útil (Anos)
            </label>
            <input type='number' step='1' class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
              Taxa de Depreciação (%/Ano)
            </label>
            <input type='text' readonly class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
          </div>
        </div>

        <div class='-mx-3 flex flex-col mb-6 w-full'>
          <div class='flex items-center justify-between w-full pb-6'>
            <h3 class="text-grey-darkest ml-3">Dados Gerais</h3>
            <button id="new-data-field" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Nova Informação</button>
          </div>
          <div id="data-fields">

            <div class="flex pb-6 items-center justify-around border-grey">
              <div class="flex-1 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Dado
                </label>
                <input type='text' name='data_field[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
              </div>
              <div class="flex-1 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Valor
                </label>
                <input type='text' name='data_value[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
              </div>
              <div class='px-3 mt-5'>
                <button class="flex-no-shrink no-underline p-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
              </div>
            </div>

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
