<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Seus cabeçalhos do HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <title>Cadastro de produtos</title>
</head>

<body>
    <style>
        .table-gradient {
            background: linear-gradient(to bottom, #42636b, #7e91c9);
            color: #ffffff;
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
                <tr class="text-center">
                    <td colspan="6" class="border px-4 py-2 text-center">Nenhum dado encontrado</td>
                </tr>
                @else
                @foreach($produtos as $produto)
                <tr class="text-center">
                    <td class="border px-4 py-2 truncate" style="max-width: 150px;">{{ $produto->codigoID }}</td>
                    <td class="border px-4 py-2 truncate" style="max-width: 150px;">{{ $produto->nome }}</td>
                    <td class="border px-4 py-2 truncate" style="max-width: 150px;">{{ $produto->linkImg }}</td>
                    <td class="border px-4 py-2 truncate" style="max-width: 150px;">R${{ $produto->preco }}</td>
                    <td class="border px-4 py-2 truncate" style="max-width: 150px;">{{ $produto->CEP }}</td>
                    <td class="border px-4 py-2">
                        <a href="/editar/{{ $produto->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Editar
                        </a>
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" onclick="excluirProduto(event)" data-id="{{ $produto->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script>
        //executada após evento onclick do botão excluir
        function excluirProduto(event) {

            event.preventDefault();

            const id = event.target.getAttribute('data-id');
            console.log(id)

            //exibe mensagem de alerta pedindo a confirmação da ação
            Swal.fire({
                title: 'Confirmar exclusão?',
                text: 'Tem certeza de que deseja excluir este produto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ação de exclusão confirmada
                    Swal.fire({
                        title: "Aguarde",
                        text: "Excluindo produto...",
                        imageUrl: "images/loading.gif",
                        imageWidth: 100,
                        imageHeight: 100,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    });

                    // Envio da solicitação POST usando o Axios
                    axios.post(`/deleteProdutos/${id}`)
                        .then(response => {
                            // Lida com a resposta da requisição
                            Swal.fire({
                                icon: "success",
                                text: "Produto excluído com sucesso!",
                                showConfirmButton: false,
                                timer: 2000,
                            }).then(() => {
                                location.reload(); // Recarrega a página após a exclusão ser concluída
                            });
                        })
                        .catch(error => {
                            // Lida com erros na requisição
                            console.error(error);
                            Swal.fire({
                                icon: "error",
                                text: "Erro ao excluir produto!",
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        });
                }
            });
        }
    </script>
</body>

</html>