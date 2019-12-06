'use strict'

//ler cartão
let idcard = document.getElementById('idcard')

//Event Listener adicionado
idcard.addEventListener("keyup",cardvalid)

// Verifica se é um cartao valido, ou seja se tem 16 digitos
function cardvalid() {

    let newcard = document.getElementById('idcard').value

    if(newcard.length == 16)
    {
        document.getElementById('updatecard').disabled = false
        document.getElementById('message').style.display= "none"
    }
    else {
        document.getElementById('updatecard').disabled = true
        document.getElementById('message').style.display= "block"
    }

}