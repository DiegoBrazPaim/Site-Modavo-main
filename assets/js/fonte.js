function mudarTamanhoFonte(valor) {
  var elementosTexto = document.querySelectorAll('body, h1, h2, h3, h4, h5, h6, p, li');
  elementosTexto.forEach(function (elemento) {
      if (!elemento.classList.contains('bot0es')) {
          var tamanhoAtual = parseInt(window.getComputedStyle(elemento).fontSize) || 16;
          var novoTamanho = tamanhoAtual + valor;
          novoTamanho = Math.min(Math.max(novoTamanho, 10), 40);
          elemento.style.fontSize = novoTamanho + 'px';
      }
  });
}
  