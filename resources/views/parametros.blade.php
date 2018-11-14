<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var template_inss = $('#inss_table_element').html();
      var template_irrf = $('#irrf_table_element').html();
      var template_salfam = $("#salfam_table_element").html();

      $("#new-inss").on('click',function(){
        $('#inss_table_container').append(template_inss);
        $(".btn-delete-inss-row").unbind("click");

        $(".btn-delete-inss-row").on('click',function(){
          $(this).closest('.data-field-parent').remove();
        });
      });

      $("#new-irrf").on('click',function(){
        $('#irrf_table_container').append(template_irrf);
        $(".btn-delete-irrf-row").unbind("click");

        $(".btn-delete-irrf-row").on('click',function(){
          $(this).closest('.data-field-parent').remove();
        });
      });

      $("#new-salfam").on('click',function(){
        $('#salfam_table_container').append(template_salfam);
        $(".btn-delete-salfam-row").unbind("click");

        $(".btn-delete-salfam-row").on('click',function(){
          $(this).closest('.data-field-parent').remove();
        });
      });

    });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter min-h-screen">

    @include('components.sidebar')

    <div class="md:mx-5 flex flex-col flex-1 items-center font-sans">

      <!-- FORM FOR PARAMETER TABLE -->
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='self-center mx-auto mb-5'><h1 class='text-grey-darkest'>Parâmetros</h1></div>
        <form method="POST" action="{{ url('/parametro') }}" id="form_parametro">
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


      <!-- FORM FOR INSS TABLE -->
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='flex items-center justify-between w-full pb-6'>
              <h3 class="text-grey-darkest ml-3">Tabela INSS</h3>
              <button id="new-inss" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" type="button">Nova Linha</button>
            </div>
        <form method="POST" action="{{ url('/inss') }}" id="form_inss">
          @csrf

          <div id='inss_table_container'></div>

          <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
            <button id="update_inss" type="button" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" 
              type='submit'>
              Atualizar
            </button>
          </div>
        </form>
      </div>

      <!-- FORM FOR IRRF TABLE -->
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='flex items-center justify-between w-full pb-6'>
              <h3 class="text-grey-darkest ml-3">Tabela IRRF</h3>
              <button id="new-irrf" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" type="button">Nova Linha</button>
            </div>
        <form method="POST" action="{{ url('/irrf') }}" id="form_irrf">
          @csrf

          <div id='irrf_table_container'></div>

          <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
            <button id="update_irrf" type="button" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" 
              type='submit'>
              Atualizar
            </button>
          </div>
        </form>
      </div>


      <!-- FORM FOR SALARIO FAMILIA TABLE -->
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <div class='flex items-center justify-between w-full pb-6'>
              <h3 class="text-grey-darkest ml-3">Tabela Salário Família</h3>
              <button id="new-salfam" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" type="button">Nova Linha</button>
            </div>
        <form method="POST" action="{{ url('/salario_familia') }}" id="form_salfam">
          @csrf

          <div id='salfam_table_container'></div>

          <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
            <button id="update_salfam" type="button" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" 
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

<script type="text/template" id="inss_table_element">

<div class="data-field-parent flex pb-6 items-center justify-around border-grey">
  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Mínimo
    </label>
    <input type='number' step="0.01" min="0" name='data_minimo[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Máximo
    </label>
    <input type='number' step="0.01" min="0" name='data_maximo[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Alíquota
    </label>
    <input type='number' step="0.01" min="0" max="100" name='data_aliquota[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class='px-3 mt-5'>
    <button class="btn-delete-inss-row flex-no-shrink no-underline p-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
  </div>
</div>

</script>

<script type="text/template" id="irrf_table_element">

<div class="data-field-parent flex pb-6 items-center justify-around border-grey">
  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Mínimo
    </label>
    <input type='number' step="0.01" min="0" name='data_minimo[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Máximo
    </label>
    <input type='number' step="0.01" min="0" name='data_maximo[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Alíquota
    </label>
    <input type='number' step="0.01" min="0" max="100" name='data_aliquota[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Desconto
    </label>
    <input type='number' step="0.01" min="0" name='data_desconto[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class='px-3 mt-5'>
    <button class="btn-delete-irrf-row flex-no-shrink no-underline p-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
  </div>
</div>

</script>

<script type="text/template" id="salfam_table_element">

<div class="data-field-parent flex pb-6 items-center justify-around border-grey">
  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Mínimo
    </label>
    <input type='number' step="0.01" min="0" name='data_minimo[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Máximo
    </label>
    <input type='number' step="0.01" min="0" name='data_maximo[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class="flex-1 px-3">
    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
      Valor
    </label>
    <input type='number' step="0.01" min="0" max="100" name='data_valor[]' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
  </div>

  <div class='px-3 mt-5'>
    <button class="btn-delete-salfam-row flex-no-shrink no-underline p-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
  </div>
</div>

</script>
