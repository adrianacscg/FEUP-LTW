'use strict'

// change password

let passR = document.getElementById('idPasswordR')

//Event Listener adicionado
passR.addEventListener("keyup",PassMatching)

//Funcao que verifica se as palavras-passe sao identicas
function PassMatching(event){
    
    let pass = document.getElementById('idPassword').value

    if (pass == event.target.value){
        
        document.getElementById('updatepass').disabled = false
        document.getElementById('match').style.display= "none"

    } else {

        document.getElementById('updatepass').disabled = true
        document.getElementById('match').style.display= "block"

    }
}

// change email

let submit= document.getElementById('formchangemail')

submit.addEventListener('submit',checkEmail)

function checkEmail(event){

    let email= document.getElementById('idEmail').value     // email value
    
    //Ajax Request
    let request = new XMLHttpRequest()

    request.addEventListener("load",function(){

        let response= JSON.parse(this.responseText)
        console.log(response)

        if(response=="1"){
            document.getElementById('checked').style.display = "block"
            event.preventDefault()
        }else{
            console.log("hello")
        }   

    })

    request.open('POST', "../api/api_user_exists.php",false)
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
    request.send(encodeForAjax({'email': email}))
    console.log(request)    
}


// Helper function
function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}