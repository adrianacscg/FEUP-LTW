'use strict'

let ci=new Date(document.getElementById('datIni').value)

let co = new Date(document.getElementById('datFim').value)

let Difference_In_Time = co.getTime() - ci.getTime(); 

let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

document.getElementById('precoT').value = Difference_In_Days * document.getElementById('precoD').innerHTML