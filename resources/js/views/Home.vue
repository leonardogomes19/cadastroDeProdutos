<template>
    <div>
      <h1>Cadastro de Produtos</h1>
      <div>
        <label for="codigo">Código de Identificação:</label>
        <input type="text" id="codigo">
      </div>
      <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome">
      </div>
      <div>
        <label for="imagem">Link da Imagem:</label>
        <div id="imagem"></div>
      </div>
      <div>
        <label for="preco">Preço:</label>
        <input type="text" id="preco">
      </div>
      <div>
        <label for="cep">CEP:</label>
        <input type="text" id="cep">
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Home',
  };
  </script>
  
  <style scoped>
  /* Estilos CSS específicos para o componente Home.vue */
  </style>