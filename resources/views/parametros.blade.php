<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
</head>
<body>
  <div class="flex bg-grey-lighter w-screen h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 items-start justify-center font-sans">
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='self-center mx-auto mb-5'><h1 class='text-grey-darkest'>Parâmetros</h1></div>
        <form method="POST" action="{{ url('/parametro') }}">
          @csrf

          <div class='flex flex-row'>
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Salário Mínimo
              </label>
              <input name='salario_minimo' value="{{ $parametro->parametro_salario_minimo }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" min="0" type="number" step="0.01">
            </div>

            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Abate por Dependente (IRRF)
              </label>
              <input name='abate_dependente' value="{{ $parametro->parametro_abate_dependente }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" min="0" type="number" step="0.01">
            </div>
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              FGTS (%)
            </label>
            <input name='fgts' value="{{ $parametro->parametro_fgts * 100 }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number" min="0" max="100" step="0.01">
          </div>
          <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
            <button id="update_parametro" type="button" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" 
              type='submit'>
              Atualizar
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
</html>
