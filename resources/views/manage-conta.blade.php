<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>
<body>
  <div class="flex bg-grey-lighter w-screen h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 items-start justify-center font-sans">
      <div class="bg-white rounded shadow p-6 m-10 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-10 flex justify-between">
          <h1 class="text-grey-darkest">Contas</h1>
          <a href="{{ url('/conta/add') }}" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Nova Conta</a>
        </div>
        <div>

          @foreach($contas as $conta)
          <div class="flex mb-4 items-center border-b pb-2">
            <p class="w-full text-grey-darkest">{{$conta->conta_codigo}} - {{$conta->conta_descricao}}</p>
            <a href="{{ url('/conta/'.$conta->conta_id) }}" class="no-underline flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-teal border-teal hover:bg-teal">Editar</a>
            <a class="no-underline  flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</body>
</html>
