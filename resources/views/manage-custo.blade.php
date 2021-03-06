<html>
<head>
  <title>Accounting v0.1</title>
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
  <script type='text/javascript'>
  $(document).ready(function(){

    $("#modalDelete").iziModal();

    var baseDeleteUrl = "{{ url('/custo/') }}";
    var deleteUrl;

    $('.delete-custo').on('click', function (event) {
      event.preventDefault();
      deleteUrl = baseDeleteUrl + '/' + $(this).data('custo-id');
      $('#deleteCustoForm').attr('action',deleteUrl);
      $('#modalDelete').iziModal('setZindex', 99999);
      $('#modalDelete').iziModal('open');
    });

    $('#deleteCustoForm').ajaxForm({
      dataType: 'json',
      success: function(data){
        if(data.success){
          window.location.replace(data.location);
        }else{
          alert(data.msg);
          $('#modalDelete').iziModal('close');
        }
      },
      error: function(data){
        alert('Ocorreu um erro ao excluir este lançamento.');
      }
    });

  });
  </script>
</head>
<body>
  <div class="flex bg-grey-lighter w-screen h-screen">

    @include('components.sidebar')

    <div class="flex flex-1 items-start justify-center font-sans">
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
                <td class='pl-2 border-l border-grey-light text-grey-darkest'><a data-custo-id="{{ $custo->lancamento_id }}" class='delete-custo no-underline text-red hover:text-red-dark cursor-pointer'>Excluir</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>

          @endif
        </div>
      </div>
    </div>

    <div id='modalDelete'>
      <div class='flex flex-col p-10 items-center'>
        <h1 class="text-grey-darkest pb-5">Deseja excluir este lançamento de custo?</h1>
        <div class='flex justify-around'>
          <form id='deleteCustoForm' method="POST">
            @method('DELETE')
            @csrf
            <div class='flex justify-around'>
              <button type='submit' class="flex-no-shrink p-2 ml-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Confirmar Exclusão</button>
              <button data-iziModal-close class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</body>
</html>
