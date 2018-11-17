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

      $('#funcionarioForm').ajaxForm({
        dataType: 'json',
        success: function(data){
          iziToast.success({
            title: 'OK',
            message: 'Funcionário Atualizado.',
          });
        },
        error: function(data){
          iziToast.error({
            title: 'Erro',
            message: 'Um erro ocorreu.',
          });
        }
      });

    });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter min-h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 flex-col items-center font-sans">

      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <form id='funcionarioForm' action="{{ url('/funcionario/'.$funcionario->funcionario_id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class='flex mb-6'>
            <h1 class="text-grey-darkest">Editar Funcionário</h1>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Nome do Funcionário
              </label>
              <input name='funcionario_nome' max='500' value="{{ $funcionario->funcionario_nome }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="Josías dos Santos dos Santos">
            </div>
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Cargo do Funcionário
              </label>
              <input name='funcionario_cargo' max='500' value="{{ $funcionario->funcionario_cargo  }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="Gerente de Vendas">
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Dependentes Financeiros
              </label>
              <input name='funcionario_dependentes' min='0' step='1' value="{{ $funcionario->funcionario_dependentes }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
            </div>
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Filhos (Menores de 14 anos)
              </label>
              <input name='funcionario_filhos_menores' min='0' step='1' value="{{ $funcionario->funcionario_filhos_menores }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Adicional Insalubridade (%)
              </label>
              <input name='funcionario_insalubridade' min='0' step='0.01' max="100" value="{{ $funcionario->funcionario_insalubridade*100 }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
            </div>
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                Salário Base
              </label>
              <input name='funcionario_salario_base' min='0' step='0.01' value="{{ $funcionario->funcionario_salario_base }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
            </div>
          </div>

          <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                Status do Funcionário
              </label>
              <div class="relative">
                <select name='funcionario_inativo' required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                  <option value='false' @if(!$funcionario->funcionario_inativo) selected @endif >Ativo</option>
                  <option value='true' @if($funcionario->funcionario_inativo) selected @endif >Inativo</option>
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                  <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>

            <div class="md:w-1/2 px-3 sm:mb-5">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                Situação INSS
              </label>
              <div class="relative">
                <select name='funcionario_recolhe_inss' required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                  <option value='true' @if($funcionario->funcionario_recolhe_inss) selected @endif>Recolhe INSS nesta empresa.</option>
                  <option value='false' @if(!$funcionario->funcionario_recolhe_inss) selected @endif>Recolhe INSS de outra empresa.</option>
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                  <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>

          </div>

          <div class='flex flex-row border-t border-grey justify-end pt-5 pr-5'>
            <button class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" type='submit'>Cadastrar</button>
          </div>

        </form>
      </div>

      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2 mb-12">
        <div class='flex items-center justify-between w-full pb-6'>
          <h3 class="text-grey-darkest ml-3">Vales</h3>
          <button id="new-vale" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green" type="button">Adicionar Vale</button>
        </div>
          <div id='vale_table_container'>
            @foreach($funcionario->vales as $vale)

              <div class="data-field-parent flex pb-6 items-center justify-around border-grey">
                <div class="flex-1 px-3">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Data
                  </label>
                  <input readonly value="{{ $vale->readableDate() }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                </div>

                <div class="flex-1 px-3">
                  <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Valor (R$)
                  </label>
                  <input readonly value="{{ $vale->readableValue() }}" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
                </div>

                <div class='px-3 mt-5'>
                  <button type="button" class="btn-delete-vale flex-no-shrink no-underline p-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
                </div>
              </div>

            @endforeach
          </div>
    </div>
  </div>
</div>
</body>
</html>
