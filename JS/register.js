'use strict'

let passR = document.getElementById('idPasswordR')
passR.addEventListener("keyup",PassMatching)

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