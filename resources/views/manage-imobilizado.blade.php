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

    var baseDeleteUrl = "{{ url('/imobilizado/') }}";
    var deleteUrl;

    $('.delete-imob').on('click', function (event) {
      event.preventDefault();
      deleteUrl = baseDeleteUrl + '/' + $(this).data('imob-id');
      $('#deleteImobilizadoForm').attr('action',deleteUrl);
      $('#modalDelete').iziModal('setZindex', 99999);
      $('#modalDelete').iziModal('open');
    });

    $('#deleteImobilizadoForm').ajaxForm({
      dataType: 'json',
      success: function(data){
        if(data.success){
          location.reload();
        }else{
          alert(data.msg);
          $('#modalDelete').iziModal('close');
        }
      },
      error: function(data){
        alert('Ocorreu um erro ao excluir este imobilizado.');
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
          <h1 class="text-grey-darkest">Imobilizados</h1>
          <a href="{{ url('/imobilizado/add') }}" class="flex-no-shrink no-underline p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Novo Imobilizado</a>
        </div>
        <div>

          @if(count($imobilizados)==0)
          <div class='flex flex-row items-center justify-center mb-5'>
            <h3 class="text-grey-dark">Nenhum imobilizado foi cadastrado.</h3>
          </div>
          @else

          @foreach($imobilizados as $imobilizado)
          <div class="flex mb-4 items-center border-b pb-2">
            <p class="w-full text-grey-darkest">Imobilizado #{{ $imobilizado->imob_id }} - {{ $imobilizado->imob_descricao  }}</p>
            <a href="{{ url('/imobilizado/'.$imobilizado->imob_id) }}" class="no-underline flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-teal border-teal hover:bg-teal">Editar</a>
            <button data-imob-id="{{ $imobilizado->imob_id }}" class="delete-imob flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
          </div>
          @endforeach

          @endif
        </div>
      </div>
    </div>

  </div>

  <div id='modalDelete'>
    <div class='flex flex-col p-10 items-center'>
      <h1 class="text-grey-darkest pb-5">Deseja excluir este imobilizado?</h1>
      <div class='flex justify-around'>
        <form id='deleteImobilizadoForm' method="POST">
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

</body>
</html>
