'use strict'

let dataAtual= new Date()

let dd = String(dataAtual.getDate()).padStart(2, '0')
let mm = String(dataAtual.getMonth() + 1).padStart(2, '0') 
let yyyy = dataAtual.getFullYear()

let dataAtualS = yyyy + '-' + mm + '-' + dd

let dateI = document.getElementById('datIni')
let dateF = document.getElementById('datFim')

dateI.addEventListener('change', dateChangeI)
dateF.addEventListener('change', dateChangeF)

//id da Moradia

let idM=document.getElementById('idMor')

//calcula preco

let DateToChange= new Date(dateF.value)
let DateInicial= new Date(dateI.value)

let Difference_In_Time = DateToChange.getTime() - DateInicial.getTime();
        
let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

if(Difference_In_Days>0){

    document.getElementById('precoT').value = (Difference_In_Days + 1) * document.getElementById('precoD').innerHTML
}

function dateChangeI(event){

    let DateToChange= new Date(event.target.value)
    let DateFinal= new Date(dateF.value)


    if((DateToChange < dataAtual || DateToChange > DateFinal) && dateF.value!=""){
        event.target.value=dataAtualS
        //nao será com alert
        alert("Please introduce a valid date")
    }
}

function dateChangeF(event){

    DateToChange= new Date(event.target.value)
    DateInicial= new Date(dateI.value)

    if(DateInicial > DateToChange){
        event.target.value=dateI
        //nao será com alert
        alert("Please introduce a valid date") 
    }else{
        
        if(event.target.value=="") {
            
            document.getElementById('precoT').value="";
            return;
        }
        Difference_In_Time = DateToChange.getTime() - DateInicial.getTime();
        

        Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

        document.getElementById('precoT').value = (Difference_In_Days + 1) * document.getElementById('precoD').innerHTML
    }
}

//Button submit

let submit=document.getElementById('Sform')


submit.addEventListener('submit',LetsSubmit)

function LetsSubmit(event){

    
    
    
    if( dateI.value=="" || dateF.value==""){
        
        alert("Please introduce a valid date")
        event.preventDefault()
    }else{
        let request = new XMLHttpRequest();

        request.addEventListener("load", function(){
            console.log(this)
            let response= JSON.parse(this.responseText)
            
            
            if(response=="0"){
                event.preventDefault();
                alert("There is already a reservation for that date!")
            }


        });
        
        request.open('POST', "../api/api_check_dates.php",false)
        request.setRequestHeader('Content-Type','application/x-www-form-urlencoded')
        console.log(dateF.value)
        request.send(encodeForAjax({'idM':idM.value,'ci': dateI.value,'co': dateF.value}))
        
    }

    
}



// Helper function
function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}
