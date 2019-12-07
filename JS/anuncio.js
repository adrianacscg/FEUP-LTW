'use strict'

let dataAtual= new Date()

let dd = String(dataAtual.getDate()).padStart(2, '0')
let mm = String(dataAtual.getMonth() + 1).padStart(2, '0') 
let yyyy = dataAtual.getFullYear()

let dataAtualS = yyyy + '-' + mm + '-' + dd

let dateI = document.getElementById('datIni')
let dateF = document.getElementById('datFim')

dateI.value= dataAtualS

dateI.addEventListener('change', dateChange)
dateF.addEventListener('change', dateChange)

function dateChange(event){

    let DateToChange= new Date(event.target.value)
    if(DateToChange < dataAtual){
        event.target.value=dataAtualS
        //nao será com alert
        alert("Hey dumbass, introduce a fucking valid date")
    }
}
