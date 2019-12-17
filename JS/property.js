'use strict'

//-------- check rating ---------

let rating = document.getElementById('idrating')

//change property 
let rating2 = document.getElementById('idrating2')

rating.addEventListener("keyup", ratingchange)
rating2.addEventListener("keyup", ratingchange)

function ratingchange(event) {

    if(rating.value > 5 || rating.value < 0)
    {
        document.getElementById("addproperty1").style.display = "none";
        alert("Please enter a ranking from 1 to 5")
    } else document.getElementById("addproperty1").style.display = "block";


    if(rating2.value > 5 || rating2.value < 0)
    {
        document.getElementById("updateproperty").style.display = "none";
        alert("Please enter a ranking from 1 to 5")
    } else document.getElementById("updateproperty").style.display = "block";

}

//-------- check price ---------

let price = document.getElementById('idPreco')
let price2 = document.getElementById('idPreco2')

price.addEventListener("keyup", pricechange)
price2.addEventListener("keyup", pricechange)

function pricechange(event) {
    
    if(price.value > 10000 || price.value < 0)
    {
        document.getElementById("addproperty1").style.display = "none";
        alert("Enter less than 10000 euros")
    } else document.getElementById("addproperty1").style.display = "block";


    if(price2.value > 10000 || price2.value < 0)
    {
        document.getElementById("updateproperty").style.display = "none";
        alert("Enter less than 10000 euros")
    } else document.getElementById("updateproperty").style.display = "block";
}

