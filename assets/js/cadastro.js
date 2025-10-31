const form = document.getElementById('form')
const nomeInput = document.getElementById('nome')
const dataNascInput = document.getElementById('dataNascimento')
const generoInput = document.getElementById('genero')
const nomeMaternoInput = document.getElementById('nomeMaterno')
const cpfInput = document.getElementById('cpf')
const telefoneFixoInput = document.getElementById('telefone')
const celularInput = document.getElementById('celular')
const cepInput = document.getElementById('cep')
const enderecoInput = document.getElementById('endereco')
const numeroInput = document.getElementById('numero')

const bairroInput = document.getElementById('bairro')
const cidadeInput = document.getElementById('cidade')
const estadoInput = document.getElementById('estado')
const emailInput = document.getElementById('email')
const usuarioInput = document.getElementById('usuario')
const senhaInput = document.getElementById('senha')
const confirmaSenhaInput = document.getElementById('confirmar')
const modal = document.querySelector('dialog')
const buttonClose = document.querySelector('dialog button')

form.addEventListener("submit", (event) => {
  event.preventDefault();

  checkForm();
})


nome.addEventListener("blur", () => {
  ValidarNome();
})

dataNascimento.addEventListener("blur", () => {
  ValidarDataNascimento();
})

genero.addEventListener("blur", () => {
  ValidarGenero();
})

nomeMaterno.addEventListener("blur", () => {
  ValidarNomeMaterno();
})

cpf.addEventListener("blur", () => {
  ValidarCPF();
})

telefone.addEventListener("blur", () => {
  ValidarTelefoneFixo();
})

celular.addEventListener("blur", () => {
  ValidarTelefoneCelular();
})


cep.addEventListener("blur", () => {
  ValidarCep();
})

endereco.addEventListener("blur", () => {
  ValidarEndereco();
})

numero.addEventListener("blur", () => {
  ValidarNumeror();
})



bairro.addEventListener("blur", () => {
  ValidarBairro();
})

cidade.addEventListener("blur", () => {
  ValidarCidade();
})

estado.addEventListener("blur", () => {
  ValidarEstado();
})

email.addEventListener("blur", () => {
  ValidarEmail();
})


usuario.addEventListener("blur", () => {
  ValidarUsuario();
})

senha.addEventListener("blur", () => {
  ValidarSenha();
})

confirmar.addEventListener("blur", () => {
  ValidarConfirmacaoSenha();;
})


function ValidarNome() {
  const nomeInput = document.querySelector('#nome'); // Seleciona o campo de input do nome
  const nomeValue = nomeInput.value;
  const nomeRegex = /^[a-zA-Z\s]{8,60}$/; // Regex para 8 a 60 caracteres alfabéticos

  if (nomeValue === "") {
    errorInput(nomeInput, "Preencha o nome!");
  } else {
    if (!nomeRegex.test(nomeValue)) {
      errorInput(nomeInput, "O nome precisa ter entre 8 e 60 caracteres alfabéticos!");
    } else {
      const formItem = nomeInput.parentElement;
      formItem.className = "form-content";
    }
  }
}


function ValidarDataNascimento() {
  const nomeValue = dataNascInput.value;

  if (nomeValue === "") {
    errorInput(dataNascInput, "Preencha a data de nascimento!")
  } else {
    const formItem = dataNascInput.parentElement;
    formItem.className = "form-content"
  }

}

function ValidarGenero() {
  const generoValue = generoInput.value;

  if (generoValue === "") {
    errorInput(generoInput, "Escollha o gênero!")
  } else {
    const formItem = generoInput.parentElement;
    formItem.className = "form-content"
  }

}

function ValidarNomeMaterno() {
  const nomeInput = document.querySelector('#nomeMaterno'); // Seleciona o campo de input do nome
  const nomeValue = nomeInput.value;
  const nomeRegex = /^[a-zA-Z\s]{8,60}$/; // Regex para 8 a 60 caracteres alfabéticos

  if (nomeValue === "") {
    errorInput(nomeInput, "Preencha o nome!");
  } else {
    if (!nomeRegex.test(nomeValue)) {
      errorInput(nomeInput, "O nome precisa ter entre 8 e 60 caracteres alfabéticos!");
    } else {
      const formItem = nomeInput.parentElement;
      formItem.className = "form-content";
    }
  }
}




function ValidarCPF() {
  const cpfValue = cpfInput.value;
  const cpfRegex = new RegExp(/^(?:[0-9]{3}\.){2}(?:[0-9]{3}\-)(?:[0-9]){2}$/)


  if (cpfValue === "") {
    errorInput(cpfInput, "O cpf é obrigatório.")
  } else {
    if (!cpfRegex.test(cpfValue)) {
      errorInput(cpfInput, "Preencha um CPF válido!")
    }
    if (!ValidaCpf(cpfValue)) {
      errorInput(cpfInput, "Preencha um CPF válido!")
    }
    else {
      const formItem = cpfInput.parentElement;
      formItem.className = "form-content"
    }
  }
}

function ValidaCpf(cpf) {
  console.log(cpf);
  cpf = cpf.replace(/\.|-/g, "");

  // Verifica se todos os dígitos do CPF são iguais e retorna uma mensagem para o cliente
  if (cpf.split('').every((char) => char === cpf[0])) {
    console.log("CPF inválido. Por favor, digite um CPF válido.");
    return false;
  }

  soma = 0;
  soma += cpf[0] * 10;
  soma += cpf[1] * 9;
  soma += cpf[2] * 8;
  soma += cpf[3] * 7;
  soma += cpf[4] * 6;
  soma += cpf[5] * 5;
  soma += cpf[6] * 4;
  soma += cpf[7] * 3;
  soma += cpf[8] * 2;
  soma = (soma * 10) % 11;
  if (soma == 10 || soma == 11)
    soma = 0;
  console.log("Primeiro d: " + soma);
  if (soma != cpf[9]) {
    console.log("CPF inválido. Por favor, digite um CPF válido.");
    return false;
  }

  soma = 0;
  soma += cpf[0] * 11;
  soma += cpf[1] * 10;
  soma += cpf[2] * 9;
  soma += cpf[3] * 8;
  soma += cpf[4] * 7;
  soma += cpf[5] * 6;
  soma += cpf[6] * 5;
  soma += cpf[7] * 4;
  soma += cpf[8] * 3;
  soma += cpf[9] * 2;
  soma = (soma * 10) % 11;
  if (soma == 10 || soma == 11)
    soma = 0;
  console.log("Segundo d: " + soma);
  if (soma != cpf[10]) {
    console.log("CPF inválido. Por favor, digite um CPF válido.");
    return false;
  }

  // Se o CPF passar por todas as verificações, é considerado válido
  console.log("CPF válido.");
  return true;
}

// MÁSCARA CPF

const cpfinput = document.querySelector('#cpf'); // Corrigindo o nome da variável

cpfinput.addEventListener('input', () => { // Usando cpfinput ao invés de input
  let inputlength = cpfinput.value.length; // Usando cpfinput para referenciar o campo CPF

  if (inputlength === 3 || inputlength === 7) {
    cpfinput.value += '.';
  } else if (inputlength === 11) {
    cpfinput.value += '-';
  }
});



function ValidarTelefoneFixo() {
  const telefoneFixoValue = telefoneFixoInput.value;

  if (telefoneFixoValue === "") {
    errorInput(telefoneFixoInput, "O telefone fixo é obrigatório.")
  } else {
    const formItem = telefoneFixoInput.parentElement;
    formItem.className = "form-content"
  }

}

// MÁSCARA TELEFONE FIXO

const telefoneInput = document.querySelector('#telefone'); // Seleciona o campo de input do telefone

telefoneInput.addEventListener('input', () => { // Adiciona um listener para o evento 'input'
  let inputLength = telefoneInput.value.length;
  const telefone = telefoneInput.value;

  if (inputLength === 2) {
    telefoneInput.value = `(+55)${telefone}-`; // Adiciona os parênteses e o hífen após os primeiros 3 dígitos
  } else if (inputLength > 3 && inputLength <= 8) {
    telefoneInput.value = `(+55)${telefone.slice(3, inputLength)}-${telefone.slice(inputLength)}`; // Mantém os parênteses e o hífen enquanto o usuário digita os próximos 5 dígitos
  }
});



function ValidarTelefoneCelular() {
  const celularValue = celularInput.value;

  if (celularValue === "") {
    errorInput(celularInput, "O celular é obrigatório.")
  } else {
    const formItem = celularInput.parentElement;
    formItem.className = "form-content"
  }

}

// MÁSCARA CELULAR

const celularinput = document.querySelector('#celular'); // Seleciona o campo de input do celular

celularInput.addEventListener('input', () => { // Adiciona um listener para o evento 'input'
  let inputLength = celularInput.value.length;
  const celular = celularInput.value;

  if (inputLength === 2) {
    celularInput.value = `(+55)${celular}-`; // Adiciona os parênteses e o hífen após os primeiros 3 dígitos
  } else if (inputLength > 3 && inputLength <= 9) {
  }
});


function ValidarCep() {
  const cepValue = cepInput.value;
  const cepRegex = /^(?:\d{5}-?\d{3})$/; // Expressão regular para validar CEP no formato "XXXXX-XXX" ou "XXXXX"

  if (cepValue === "") {
    errorInput(cepInput, "O CEP é obrigatório.");
  } else {
    if (!cepRegex.test(cepValue)) {
      errorInput(cepInput, "Preencha um CEP válido!");
    } else {
      const formItem = cepInput.parentElement;
      formItem.className = "form-content"; // Se for um CEP válido, limpar a indicação de erro
    }
  }
}

// MÁSCARA CEP

const cepinput = document.querySelector('#cep'); // Seleciona o campo de input do CEP

cepInput.addEventListener('input', () => { // Adiciona um listener para o evento 'input'
  let inputLength = cepInput.value.length;

  if (inputLength === 5) {
    cepInput.value += '-'; // Adiciona o hífen quando o comprimento é igual a 5
  }
});


function ValidarEndereco() {
  const enderecoValue = enderecoInput.value;

  if (enderecoValue === "") {
    errorInput(enderecoInput, "O endereço é obrigatório.")
  } else {
    const formItem = enderecoInput.parentElement;
    formItem.className = "form-content"
  }

}

function ValidarNumero() {
  const numeroValue = numeroInput.value;

  if (numeroValue === "") {
    errorInput(numeroInput, "O numero é obrigatório.")
  } else {
    const formItem = numeroInput.parentElement;
    formItem.className = "form-content"
  }

}



function ValidarBairro() {
  const bairroValue = bairroInput.value;

  if (bairroValue === "") {
    errorInput(bairroInput, "O bairro é obrigatório.")
  } else {
    const formItem = bairroInput.parentElement;
    formItem.className = "form-content"
  }

}

function ValidarCidade() {
  const cidadeValue = cidadeInput.value;

  if (cidadeValue === "") {
    errorInput(cidadeInput, "A cidade é obrigatória.")
  } else {
    const formItem = cidadeInput.parentElement;
    formItem.className = "form-content"
  }

}

function ValidarEstado() {
  const estadoValue = estadoInput.value;

  if (estadoValue === "") {
    errorInput(estadoInput, "O estado é obrigatório.")
  } else {
    const formItem = estadoInput.parentElement;
    formItem.className = "form-content"
  }

}

function ValidarEmail() {
  const emailValue = emailInput.value;

  if (emailValue === "") {
    errorInput(emailInput, "O email é obrigatório.")
  } else {
    const formItem = emailInput.parentElement;
    formItem.className = "form-content"
  }

}


function ValidarUsuario() {

  const usuarioValue = usuarioInput.value;
  const usuarioRegex = new RegExp(/^[a-zA-Z]{6}$/);

  if (usuarioValue === "") {
    errorInput(usuarioInput, "Preencha o usuario!")
  } else {
    if (!usuarioRegex.test(usuarioValue)) {
      errorInput(usuarioInput, "O usuario precisa ter 6 caracteres alfabeticos!")
    } else {
      const formItem = usuarioInput.parentElement;
      formItem.className = "form-content"
    }
  }
}



function ValidarSenha() {
  const senhaValue = senhaInput.value;
  const senhaRegex = new RegExp(/^[a-zA-Z]{8}$/);

  if (senhaValue === "") {
    errorInput(senhaInput, "A senha é obrigatória.")
  } else if (!senhaRegex.test(senhaValue)) {
    errorInput(senhaInput, "A senha precisa ter 8 caracteres alfabeticos!")
  } else {
    const formItem = senhaInput.parentElement;
    formItem.className = "form-content"
  }

}


function ValidarConfirmacaoSenha() {
  const senhaValue = senhaInput.value;
  const confirmaSenhaValue = confirmaSenhaInput.value;

  if (confirmaSenhaValue === "") {
    errorInput(confirmaSenhaInput, "A confirmação de senha é obrigatória.")
  } else if (confirmaSenhaValue !== senhaValue) {
    errorInput(confirmaSenhaInput, "As senhas não são iguais.")
  } else {
    const formItem = confirmaSenhaInput.parentElement;
    formItem.className = "form-content"
  }

}

function validarForm() {
  let res = document.getElementById('resultado')
  if (validarNome() && ValidarUsuario() && validarSenha() && ValidarConfirmacaoSenha() == true) {
      document.getElementById('resultado').style.color = 'white'  
      document.getElementById('resultado').style.textAlign = 'center'
      document.getElementById('resultado').style.background = '#0E1D34'
      document.getElementById('resultado').style.border = '2px'
      document.getElementById('resultado').style.borderRadius = '5px'   
      document.getElementById('resultado').style.display = 'flex'
      document.getElementById('resultado').style.justifyContent = 'center'   
      document.getElementById('resultado').style.fontSize = '20px';
      res.innerHTML = 'Cadastro Realizado! Direcionando para a página de login...'
      setTimeout(function () {
          window.location.href = "../Site-Modavo-main/index.html"
      }, 5000);
  } else {
      document.getElementById('resultado').style.color = 'red' 
      document.getElementById('resultado').style.background = '#0E1D34'
      document.getElementById('resultado').style.border = '2px'
      document.getElementById('resultado').style.borderRadius = '5px'   
      document.getElementById('resultado').style.display = 'flex'
      document.getElementById('resultado').style.justifyContent = 'center'   
      document.getElementById('resultado').style.fontSize = '20px';
      res.innerHTML = '[ERROR404] - Avalie as informações cadastradas'
  }
}










function checkForm() {
  ValidarNome();
  ValidarDataNascimento();
  ValidarGenero();
  ValidarNomeMaterno()
  ValidarCPF();
  ValidarTelefoneFixo();
  ValidarTelefoneCelular();
  ValidarCep();
  ValidarEndereco();
  ValidarBairro();
  ValidarCidade();
  ValidarUsuario();
  ValidarEmail();
  ValidarSenha();
  ValidarConfirmacaoSenha();
  ValidarNumero();
  ValidarEstado();
  validarForm();

  const formItems = form.querySelectorAll(".form-content")

  const isValid = [...formItems].every((item) => {
    return item.className === "form-content"
  });

  if (isValid) {
    Modal();
    CloseModal();
    setTimeout(function () {
      location.href = "login.html";
    }, 3000);

  }
}


function errorInput(input, message) {
  const formItem = input.parentElement;
  const textMessage = formItem.querySelector("a")

  textMessage.innerText = message;

  formItem.className = "form-content error"

}

function Modal() {
  modal.showModal()
}

function CloseModal() {
  buttonClose.onclick = function () {
    modal.close();
  }
} 