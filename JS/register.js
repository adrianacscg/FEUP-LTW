'use strict'

let passR = document.getElementById('idPasswordR')

//Event Listener adicionado
passR.addEventListener("keyup",PassMatching)

//Funcao que verifica se as palavras-passe sao identicas
function PassMatching(event){
    
    let pass = document.getElementById('idPassword').value

    if (pass == event.target.value){
        
        canSubmit = true
        document.getElementById('match').style.display= "none"

    }else {

        canSubmit = false
        document.getElementById('match').style.display= "inline"

    }
}

let submit= document.getElementById('idForm')

submit.addEventListener('submit',checkEmail)

function checkEmail(event){

    

    let email= document.getElementById('idEmail').value     // email value
    
    //Ajax Request
    let request = new XMLHttpRequest()

    

    request.addEventListener("load",function(){
        

        let response= JSON.parse(this.responseText)
        console.log(response)

        if(response=="1"){

            document.getElementById('checked').style.display = "inline"
            event.preventDefault()
        } else if(canSubmit==false){
            
            document.getElementById('checked').style.display = "none"
            event.preventDefault()
        }

    })

    request.open('POST', "../api/api_user_exists.php",false)
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
    request.send(encodeForAjax({'email': email}))
    

    
}

// Helper function
function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

//email

let emailV= document.getElementById('idEmail')


let canSubmit=true;

emailV.addEventListener('change',verificateEmail)

function verificateEmail(event){
    if (emailV.value.length>30){

        canSubmit = false
        document.getElementById('over').style.display= "inline"
    }else{
        canSubmit = true
        document.getElementById('over').style.display= "none"
    }

}
