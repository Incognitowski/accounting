<div class="flex flex-no-grow overflow-hidden shadow-lg border-t-4 bg-white mb-4 rounded-b-lg rounded-t border-grey-light md:min-w-1/6">
  <div class="px-6 py-4 mb-2 mt-4 mb-8 flex flex-col flex-no-shrink w-auto">
    <!-- SECTION 0 -->
    <div class="flex-no-shrink flex w-auto cursor-pointer border px-4 py-2 md:text-base text-lg text-grey-darkest" style="border-left: 4px solid #dae1e7 !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/') }}">Página Principal</a></div>
    </div>
    <!-- SECTION 1 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4">Receitas</div>
    <div class="flex-no-shrink flex w-auto cursor-pointer border px-4 py-2 md:text-base text-lg text-grey-darkest" style="border-left: 4px solid #51d88a !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/receita/add') }}">Lançar Receitas</a></div>
    </div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #51d88a !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/receita') }}">Gerenciar Receitas</a></div>
    </div>
    <!-- SECTION 2 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Custos</div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #ef5753 !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/custo/add') }}">Lançar Custos</a></div>
    </div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #ef5753 !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/custo') }}">Gerenciar Custos</a></div>
    </div>
    <!-- SECTION 3 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Imobilizados</div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 border-b-0 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #6cb2eb !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/imobilizado') }}">Gerenciar Imobilizados</a></div>
    </div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #6cb2eb !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/imobilizado/add') }}">Novo Imobilizado</a></div>
    </div>

    <!-- SECTION 4 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Contas</div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 border-b-0 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #fff382 !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/conta') }}">Gerenciar Contas</a></div>
    </div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #fff382 !important;">
      <div class="pl-2"><a class='no-underline text-grey-darkest' href="{{ url('/conta/add') }}">Nova Conta</a></div>
    </div>

    <!-- SECTION 4 -->
    <div class="uppercase tracking-wide text-c2 mb-1 mt-4" >Relatórios</div>
    <div class="flex-no-shrink flex cursor-pointer border px-4 py-2 text-lg text-grey-darkest md:text-base" style="border-left: 4px solid #a779e9 !important;">
      <div class="pl-2">Lucro/Imobilizado</div>
    </div>

  </div>
</div>
