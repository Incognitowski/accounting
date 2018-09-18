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
                        <h1 class="text-grey-darkest">Veículos</h1>
                        <button class="flex-no-shrink p-2 border-2 rounded text-green border-green hover:text-white hover:bg-green">Novo Veículo</button>
                    </div>
                    <div>
                        <div class="flex mb-4 items-center">
                            <p class="w-full text-grey-darkest">Veículo #1 - Placa: XXX-1234</p>
                            <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-teal border-teal hover:bg-teal">Editar</button>
                            <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
                        </div>

                        <div class="flex mb-4 items-center">
                            <p class="w-full text-grey-darkest">Veículo #2 - Placa: YYY-4321</p>
                            <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-teal border-teal hover:bg-teal">Editar</button>
                            <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
                        </div>

                        <div class="flex mb-4 items-center">
                            <p class="w-full text-grey-darkest">Veículo #3 - Placa: ZZZ-1212</p>
                            <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-teal border-teal hover:bg-teal">Editar</button>
                            <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>