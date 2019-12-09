'use strict'

let dataAtual= new Date()

let dd = String(dataAtual.getDate()).padStart(2, '0')
let mm = String(dataAtual.getMonth() + 1).padStart(2, '0') 
let yyyy = dataAtual.getFullYear()

let dataAtualS = yyyy + '-' + mm + '-' + dd

let dateI = document.getElementById('datIni')
let dateF = document.getElementById('datFim')

dateI.value= dataAtualS

dateI.addEventListener('change', dateChangeI)
dateF.addEventListener('change', dateChangeF)

function dateChangeI(event){

    let DateToChange= new Date(event.target.value)
    let DateFinal= new Date(dateF.value)

    if(DateToChange < dataAtual || DateToChange > DateFinal){
        event.target.value=dataAtualS
        //nao será com alert
        alert("Hey dumbass, introduce a fucking valid date")
    }
}

function dateChangeF(event){
    let DateToChange= new Date(event.target.value)
    let DateInicial= new Date(dateI.value)

    if(DateInicial > DateToChange){
        event.target.value=dateI
        //nao será com alert
        alert("Hey dumbshit, introduce a fucking valid date") 
    }else{
        
        let Difference_In_Time = DateToChange.getTime() - DateInicial.getTime(); 

        let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

        
        
        if(event.target.value!=""){
            document.getElementById('precoT').value= Difference_In_Days* document.getElementById('precoD').innerHTML
        }else{
            document.getElementById('precoT').value=""
        }

    }
}

//Button submit

let submit=document.getElementById('Sform')


submit.addEventListener('submit',LetsSubmit)

function LetsSubmit(event){

    
    if( dateI.value=="" || dateF.value=="" ){
        event.preventDefault()
        alert("Get your fucking shit together and input some fcking dates")
    }
}


