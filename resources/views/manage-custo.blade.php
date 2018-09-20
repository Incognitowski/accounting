<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body>
  <div class="flex bg-grey-lighter w-screen">

    @include('components.sidebar')

    <div class="h-screen w-full flex items-start justify-center font-sans">
      <div class="bg-white rounded shadow p-6 m-10 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-10 flex justify-between">
          <h1 class="text-grey-darkest">Custos</h1>
          <a href="{{ url('/custo/add') }}" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Lançar Custo</a>
        </div>
        <div>
          @if(count($custos)==0)
          <div class='flex flex-row items-center justify-center mb-5  '>
            <h3 class="text-grey-dark">Nenhum custo foi lançado.</h3>
          </div>
          @else

          <table class='w-full border-grey border rounded'>
            <thead class='border-b'>
              <td class='px-2 border-r border-grey-light text-grey-darkest font-semibold'>Data</td>
              <td class='px-2 border-l border-r border-grey-light text-grey-darkest font-semibold'>Conta</td>
              <td class='px-2 border-l border-r border-grey-light text-grey-darkest font-semibold'>Valor</td>
              <td class='px-2 border-l border-r border-grey-light text-grey-darkest font-semibold'>Imobilizado</td>
              <td></td>
            </thead>
            <tbody>
            @foreach($custos as $custo)
              <tr class='border-b'>
                <td class='pl-2 border-r border-grey-light text-grey-darkest'>{{$custo->lancamento_data}}</td>
                <td class='px-2 border-l border-r border-grey-light text-grey-darkest'>{{ $custo->conta->conta_descricao }}</td>
                <td class='px-2 border-l border-r border-grey-light text-grey-darkest'>R$ {{ $custo->lancamento_valor }}</td>
                <td class='pl-2 border-l border-r border-grey-light text-grey-darkest'>{{ $custo->imobilizado->imob_descricao }}</td>
                <td class='pl-2 border-l border-grey-light text-grey-darkest'><a class='no-underline text-red hover:text-red-dark cursor-pointer'>Excluir</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>

          @endif
        </div>
      </div>
    </div>

  </div>
</body>
</html>
