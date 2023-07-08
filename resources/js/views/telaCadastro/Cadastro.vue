<template>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <title>Cadastro de produtos</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="max-w-md p-6 bg-white rounded-md shadow-md">
        <form>
            <h1 class="text-2xl font-bold mb-4">Cadastro de Produtos</h1>
            <h2 class="text-lg font-semibold mb-6 text-gray-900">Preencha os campos abaixo</h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="codigoID" class="block mb-2 text-sm font-medium text-gray-900">Código de identificação</label>
                    <input type="text" name="codigoID" id="codigoID" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>

                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                    <input type="text" name="nome" id="nome" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>
            </div>

            <div class="mt-4">
                <label for="imagem" class="block mb-2 text-sm font-medium text-gray-900">Link da imagem</label>
                <input type="text" name="imagem" id="imagem" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm" oninput="previewImage(event)">
                <div id="imagem-preview" class="mt-2"></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="preco" class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
                    <input type="number" name="preco" id="preco" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>

                <div>
                    <label for="cep" class="block mb-2 text-sm font-medium text-gray-900">CEP</label>
                    <input type="text" name="cep" id="cep" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>
            </div>

            <div class="mt-6">
                <div>
                    <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>

                <div class="grid grid-cols-2 gap-4">
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
                <button type="button" class="mr-2 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</button>
                <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>
</template>