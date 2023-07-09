<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <title>Cadastro de produtos</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="max-w-xl p-6 bg-white rounded-md shadow-md flex">
        <form id="editarForm">
            <h1 class="text-2xl font-bold mb-4">Alterar Produto</h1>
            <h2 class="text-lg font-semibold mb-6 text-gray-900">Preencha os campos abaixo</h2>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="codigoID" class="block mb-2 text-sm font-medium text-gray-900">Código de identificação</label>
                    <input type="text" name="codigoID" id="codigoID" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>

                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                    <input type="text" name="nome" id="nome" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>

                <div>
                    <label for="preco" class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
                    <input type="number" name="preco" id="preco" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>
            </div>

            <div class="mt-4">
                <label for="imagem" class="block mb-2 text-sm font-medium text-gray-900">Link da imagem</label>
                <input type="file" id="imagem" accept="image/*" onchange="carregarImagem()" class="hidden">
                <label for="imagem" class="mr-2 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                    Selecionar Imagem
                </label>
                <span id="nomeArquivo" style="font-style: italic;color: red"></span>
                <br>
                <img id="imagemCarregada" src="" alt="">
            </div>

            <div class="grid grid-cols-3 gap-4 mt-6">
                <div>
                    <label for="cep" class="block mb-2 text-sm font-medium text-gray-900">CEP</label>
                    <input type="text" name="cep" id="cep" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm" oninput="preencherEndereco()">
                </div>
            </div>

            <div class="mt-6">
                <div>
                    <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>

                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div>
                        <label for="numero" class="block mb-2 text-sm font-medium text-gray-900">Número</label>
                        <input type="number" name="numero" id="numero" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>

                    <div>
                        <label for="complemento" class="block mb-2 text-sm font-medium text-gray-900">Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>

                    <div>
                        <label for="bairro" class="block mb-2 text-sm font-medium text-gray-900">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>

                    <div>
                        <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado</label>
                        <input type="text" name="estado" id="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>

                    <div>
                        <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" class="mr-2 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="cancelar()">Cancelar</button>
                <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editar</button>
            </div>
        </form>
    </div>

    <script>
        //Ao carregar a página essa função irá chamar um método GET para buscar os dados do produto e preencher os campos do formulário
        window.onload = function() {

            // Obtém o ID da rota atual usando o objeto request
            const id = "{{ request()->route('id') }}";
            console.log(id)

            // Envio da solicitação GET usando o Axios
            axios.get(`/getProdutos/${id}`)
                .then(response => {
                    // Lida com a resposta da requisição
                    console.log(response.data);
                    document.getElementById('codigoID').value = response.data[0].codigoID;
                    document.getElementById('nome').value = response.data[0].nome;
                    document.getElementById("nomeArquivo").textContent = response.data[0].linkImg;
                    document.getElementById('preco').value = response.data[0].preco;
                    document.getElementById('cep').value = response.data[0].CEP;

                    //recupera o valor de cep para preencher os campos do endereço
                    const cep = response.data[0].CEP;

                    // Envio da solicitação GET usando o Axios
                    axios.get(`/viaCEP/${cep}`)
                        .then(response => {
                            // Lida com a resposta da requisição
                            console.log(response.data);
                            const endereco = response.data.logradouro;
                            document.getElementById('endereco').value = endereco;

                            const complemento = response.data.complemento;
                            document.getElementById('complemento').value = complemento;

                            const bairro = response.data.bairro;
                            document.getElementById('bairro').value = bairro;

                            const estado = response.data.uf;
                            document.getElementById('estado').value = estado;

                            const cidade = response.data.localidade;
                            document.getElementById('cidade').value = cidade;

                        })
                        .catch(error => {
                            // Lida com erros na requisição
                            console.error(error);
                        });

                })
                .catch(error => {
                    // Lida com erros na requisição
                    console.error(error);
                });
        };

        //incorpora link da imagem 
        function carregarImagem() {
            var fileInput = document.getElementById("imagem");
            var file = fileInput.files[0];

            document.getElementById("nomeArquivo").textContent = file.name;
            console.log(file)

        }

        //busca CEP inserido e preenche os campos do endereço com os dados vindos da requisição API viaCep
        function preencherEndereco() {

            // Coleta dos valores dos campos do formulário
            const cep = document.getElementById('cep').value;
            var endereco = document.getElementById('endereco').value;
            var numero = document.getElementById('numero').value;
            var complemento = document.getElementById('complemento').value;
            var bairro = document.getElementById('bairro').value;
            var estado = document.getElementById('estado').value;
            var cidade = document.getElementById('cidade').value;

            // Envio da solicitação GET usando o Axios
            axios.get(`/viaCEP/${cep}`)
                .then(response => {
                    // Lida com a resposta da requisição
                    console.log(response.data);
                    endereco = response.data.logradouro;
                    document.getElementById('endereco').value = endereco;

                    complemento = response.data.complemento;
                    document.getElementById('complemento').value = complemento;

                    bairro = response.data.bairro;
                    document.getElementById('bairro').value = bairro;

                    estado = response.data.uf;
                    document.getElementById('estado').value = estado;

                    cidade = response.data.localidade;
                    document.getElementById('cidade').value = cidade;

                })
                .catch(error => {
                    // Lida com erros na requisição
                    console.error(error);
                });
        }

        // Função para lidar com o envio do formulário
        function handleSubmit(event) {
            event.preventDefault(); // Evita o comportamento padrão do envio do formulário

            //exibe mensagem de alerta pedindo a confirmação da ação
            Swal.fire({
                title: 'Confirmar edição?',
                text: 'Tem certeza de que deseja alterar este produto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3B82F6',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Sim, alterar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ação de exclusão confirmada

                    // Coleta dos valores dos campos do formulário
                    const codigoID = document.getElementById('codigoID').value;
                    const nome = document.getElementById('nome').value;
                    const linkDaImagem = document.getElementById('imagem').value;
                    var link = '';
                    var partesCaminho = '';
                    var linkImg = '';

                    console.log(linkDaImagem)
                    if (linkDaImagem.length <= 0) {
                        link = document.getElementById("nomeArquivo").textContent
                        linkImg = link;
                    } else {
                        link = document.getElementById('imagem').value;
                        partesCaminho = link.split("\\");
                        linkImg = partesCaminho[partesCaminho.length - 1];
                        console.log(linkImg)
                    }
                    console.log(link)
                    const preco = document.getElementById('preco').value;
                    const CEP = document.getElementById('cep').value;

                    const id = "{{ request()->route('id') }}";

                    // Criação do objeto de dados
                    const data = {
                        codigoID,
                        nome,
                        linkImg,
                        preco,
                        CEP,
                    };

                    // Envio da solicitação POST usando o Axios
                    axios.post(`/editProdutos/${id}`, data)
                        .then(response => {
                            // Lida com a resposta da requisição
                            console.log(response.data.status);
                            if (response.data.status != false) {
                                //alert('PRODUTO CADASTRADO COM SUCESSO!')
                                // Lida com a resposta da requisição
                                Swal.fire({
                                    icon: "success",
                                    text: "Produto alterado com sucesso!",
                                    showConfirmButton: false,
                                    timer: 2000,
                                }).then(() => {
                                   location.reload(); // Recarrega a página após a edição ser concluída
                                });

/*                                 document.getElementById('codigoID').value = '';
                                document.getElementById('nome').value = '';
                                document.getElementById('imagem').value = '';
                                document.getElementById("nomeArquivo").textContent = '';
                                document.getElementById('preco').value = '';
                                document.getElementById('cep').value = '';
                                document.getElementById('endereco').value = '';
                                document.getElementById('numero').value = '';
                                document.getElementById('complemento').value = '';
                                document.getElementById('bairro').value = '';
                                document.getElementById('estado').value = '';
                                document.getElementById('cidade').value = ''; */

                            } else {
                                //alert('PREENCHA OS CAMPOS CORRETAMENTE!')
                                // Lida com a resposta da requisição
                                Swal.fire({
                                    icon: "error",
                                    text: "Erro ao alterar produto!",
                                    showConfirmButton: false,
                                    timer: 2000,
                                })
                            }

                        })
                        .catch(error => {
                            //alert('PREENCHA OS CAMPOS CORRETAMENTE!')
                            // Lida com erros na requisição
                            Swal.fire({
                                icon: "error",
                                title: "Erro ao alterar produto!",
                                text: error,
                                showConfirmButton: false,
                                timer: 2000,
                            })
                        });
                }
            });


        }

        //redireciona para tela inicial
        function cancelar() {
            window.location.href = "/";
        }

        // Adiciona um ouvinte de evento ao envio do formulário
        document.getElementById('editarForm').addEventListener('submit', handleSubmit);
    </script>
</body>

</html>