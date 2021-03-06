<div class="flex flex-no-grow overflow-hidden shadow-lg border-t-4 bg-white mb-4 rounded-b-lg rounded-t border-grey-light md:min-w-1/6">
  <div class="px-6 py-4 mb-2 mt-4 mb-8 flex flex-col flex-no-shrink w-auto">
    <!-- SECTION 0 -->
    <a href="{{ url('/') }}" class="no-underline flex-no-shrink flex w-auto cursor-pointer border px-4 py-2 md:text-base text-lg text-grey-darkest" style="border-left: 4px solid #dae1e7 !important;">
      <div class="pl-2 text-grey-darkest">Página Principal</div>
    </a>
    <a href="{{ url('/params') }}" class="no-underline flex-no-shrink flex w-auto cursor-pointer border px-4 py-2 md:text-base text-lg text-grey-darkest" style="border-left: 4px solid #dae1e7 !important;">
      <div class="pl-2 text-grey-darkest">Parâmetros</div>
    </a>
    <!-- SECTION 1 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4">Receitas</div>
    <a href="{{ url('/receita/add') }}" class=" no-underline text-grey-darkest flex-no-shrink flex w-auto cursor-pointer border px-4 py-2 md:text-base text-lg text-grey-darkest" style="border-left: 4px solid #51d88a !important;">
      <div class="pl-2">Lançar Receitas</div>
    </a>
    <a href="{{ url('/receita') }}" class=" no-underline text-grey-darkestflex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #51d88a !important;">
      <div class="pl-2">Gerenciar Receitas</div>
    </a>
    <!-- SECTION 2 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Custos</div>
    <a href="{{ url('/custo/add') }}" class=" no-underline text-grey-darkestflex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #ef5753 !important;">
      <div class="pl-2">Lançar Custos</div>
    </a>
    <a href="{{ url('/custo') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #ef5753 !important;">
      <div class="pl-2">Gerenciar Custos</div>
    </a>
    <!-- SECTION 3 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Imobilizados</div>
    <a href="{{ url('/imobilizado') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 py-2 border-b-0 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #6cb2eb !important;">
      <div class="pl-2">Gerenciar Imobilizados</div>
    </a>
    <a href="{{ url('/imobilizado/add') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #6cb2eb !important;">
      <div class="pl-2">Novo Imobilizado</div>
    </a>

    <!-- SECTION 4 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Contas</div>
    <a href="{{ url('/conta') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 border-b-0 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #fff382 !important;">
      <div class="pl-2">Gerenciar Contas</div>
    </a>
    <a href="{{ url('/conta/add') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #fff382 !important;">
      <div class="pl-2">Nova Conta</div>
    </a>

    <!-- SECTION 5 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4">Funcionário</div>
    <a href="{{ url('/funcionario') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 border-b-0 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #de751f !important;">
      <div class="pl-2">Gerenciar Funcionários</div>
    </a>
    <a href="{{ url('/funcionario/add') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #de751f !important;">
      <div class="pl-2">Novo Funcionário</div>
    </a>

    <!-- SECTION 6 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Relatórios</div>
    <a href="{{ url('/relatorio') }}" class="no-underline text-grey-darkest flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #a779e9 !important;">
      <div class="pl-2">Gerar Relatório</div>
    </a>

  </div>
</div>
