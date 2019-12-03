'use strict'

let passR = document.getElementById('idPasswordR')

//Event Listener adicionado
passR.addEventListener("keyup",PassMatching)

//Funcao que verifica se as palavras-passe sao identicas
function PassMatching(event){
    
    let pass = document.getElementById('idPassword').value

    if (pass == event.target.value){
        
        document.getElementById('idSubmit').disabled = false
        document.getElementById('match').style.display= "none"

    }else {

        document.getElementById('idSubmit').disabled = true
        document.getElementById('match').style.display= "inline"

    }
}

let submit= document.getElementById('idForm')

submit.addEventListener('submit',checkEmail)

function checkEmail(event){

    

    let email= document.getElementById('idEmail').value     // email value
    
    //Ajax Request
    let request = new XMLHttpRequest()
    request.open("post", "../api/api_user_exists.php",true)
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
    request.send(encodeForAjax({'email': email}))
    //console.log(request)
    request.addEventListener("load",function(){

        let response= JSON.parse(this.responseText)
        console.log(response)

        if(response){
            document.getElementById('checked').display = "inline"
            //document.getElementById('idForm').preventDefault()
        }

    })
    event.preventDefault()  
   
}

// Helper function
function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}


