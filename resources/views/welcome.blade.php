<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Seus cabeçalhos do HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <title>Cadastro de produtos</title>
</head>

<body>
    <style>
        .table-gradient {
            background: linear-gradient(to bottom, #336875, #3c62cf);
            /* Substitua as cores pela cor gradiente desejada */
            color: #ffffff;
            /* Defina a cor do texto para um contraste adequado */
        }
    </style>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Produtos</h1>

        <a href="/cadastro" class="bg-blue-500 hover:bg-blue-700 float-right text-white font-bold py-2 px-4 rounded mb-4" style="cursor:pointer">
            Cadastrar Produto
        </a>

        <table class="table-auto w-full table-gradient mt-6">
            <thead>
                <tr>
                    <th class="px-4 py-2">Código de Identificação</th>
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Imagem</th>
                    <th class="px-4 py-2">Preço</th>
                    <th class="px-4 py-2">CEP</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($produtos->isEmpty())
                <tr>
                    <td colspan="6" class="border px-4 py-2 text-center">Nenhum dado encontrado</td>
                </tr>
                @else
                @foreach($produtos as $produto)
                <tr>
                    <td class="border px-4 py-2">{{ $produto->codigoID }}</td>
                    <td class="border px-4 py-2">{{ $produto->nome }}</td>
                    <td class="border px-4 py-2">
                        <img src="{{ $produto->linkImg }}" alt="{{ $produto->nome }}" class="w-12 h-12">
                    </td>
                    <td class="border px-4 py-2">{{ $produto->preco }}</td>
                    <td class="border px-4 py-2">{{ $produto->CEP }}</td>
                    <td class="border px-4 py-2">
                        <a class="text-blue-500 hover:text-blue-700"> 
                            Editar
                        </a>
                        <form method="POST" class="inline-block"> 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>