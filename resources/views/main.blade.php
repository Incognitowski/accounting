<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body>
  <div class="flex bg-grey-lighter w-screen h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 items-start justify-center font-sans">
      <div class="md:mx-10 sm:mx-12 bg-white container items-center shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-10 flex flex-col my-2">
        <h1 class='text-grey-dark w-full text-center border-b pb-3'>Relatório de Imobilizados</h1>

        @if((count($custos)==0) and (count($receitas)==0))
        <div class='flex flex-row items-center justify-center pt-5'>
          <h3 class="text-grey-dark">Nenhum lançamento encontrado para os ultimos 30 dias</h3>
        </div>
        @else
        <div class='w-full p-5 rounded flex bg-grey-lightest'>
          <!--  -->
          <div class='flex flex-col w-full border pb-5'>
            <h2 class='text-grey-dark w-full text-center border-b py-3 mb-3'>Receitas</h2>
            @foreach($receitas as $receita)
            <div class='account flex justify-between'>
              <p class='account-name md:px-5 lg:px-10 md:text-lg lg:text-xl font-medium text-green-dark'>{{ $receita->conta->conta_codigo }} - {{ $receita->conta->conta_descricao }}</p>
              <p class='account-value md:px-5 lg:px-10 md:text-lg lg:text-xl font-medium text-green-dark'>R$ {{ number_format((float)$receita->lancamento_valor, 2, ',', '.') }}</p>
            </div>
            @endforeach
          </div>
          <!--  -->
          <!--  -->
          <!--  -->
          <div class='flex flex-col w-full border pb-5'>
            <h2 class='text-grey-dark w-full text-center border-b py-3 mb-3'>Custos</h2>
            @foreach($custos as $custo)
            <div class='account flex justify-between'>
              <p class='account-name md:px-5 lg:px-10 md:text-lg lg:text-xl font-medium text-red-dark'>{{ $custo->conta->conta_codigo }} - {{ $custo->conta->conta_descricao }}</p>
              <p class='account-value md:px-5 lg:px-10 md:text-lg lg:text-xl font-medium text-red-dark'>R$ {{ number_format((float)$custo->lancamento_valor, 2, ',', '.') }}</p>
            </div>
            @endforeach
          </div>
          <!--  -->
        </div>
        <div class='flex justify-end w-full p-3'>
            @if($balanco>0)
              <p class='text-green text-xl'>Balanço: R$ {{ $balanco }}</p>
            @elseif(0>$balanco)
              <p class='text-red text-xl'>Balanço: R$ {{ $balanco }}</p>
            @endif
        </div>
        <h2 class='text-grey-dark w-full text-center border-b pb-3'>Referente à {{ $data_final }} até {{ $data_inicial }}</h2>
        @endif

      </div>
    </div>
  </div>
</body>
</html>
