<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
  <script type='text/javascript'>
    $(document).ready(function(){

        $('#funcionarioForm').ajaxForm({
            dataType: 'json',
            success: function(data){
              window.location.replace(data.funcionario);
            },
            error: function(data){
              alert('Ocorreu um erro ao inserir este funcionário.');
            }
        });

    });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter w-screen h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 items-start justify-center font-sans">
      <div class="md:mx-10 sm:mx-12 bg-white container shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
      <form id='funcionarioForm' action="{{ url('/funcionario') }}" method="POST">
        @csrf
        <div class='flex mb-6'>
          <h1 class="text-grey-darkest">Cadastrar Novo Funcionário</h1>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Nome do Funcionário
            </label>
            <input name='funcionario_nome' max='500' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="Josías dos Santos dos Santos">
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Cargo do Funcionário
            </label>
            <input name='funcionario_cargo' max='500' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="Gerente de Vendas">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Dependentes Financeiros
            </label>
            <input name='funcionario_dependentes' min='0' step='1' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Filhos (Menores de 14 anos)
            </label>
            <input name='funcionario_filhos_menores' min='0' step='1' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Adicional Insalubridade (%)
            </label>
            <input name='funcionario_insalubridade' min='0' step='0.01' max="100" required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
          </div>
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
              Salário Base
            </label>
            <input name='funcionario_salario_base' min='0' step='0.01' required class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 sm:mb-5">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
              Status do Funcionário
            </label>
            <div class="relative">
              <select name='funcionario_inativo' required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                <option value='false' selected>Ativo</option>
                <option value='true'>Inativo</option>
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
                <option value='true' selected>Recolhe INSS nesta empresa.</option>
                <option value='false'>Recolhe INSS de outra empresa.</option>
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
    </div>
  </div>
</body>
</html>
