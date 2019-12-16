'use strict'

let rating = document.getElementById('idrating')

rating.addEventListener('change', ratingchange)

function ratingchange(event) {

    if(event.target.value > 6 || event.target.value < 0)
    {
        
        let submit = document.getElementById('addproperty')

        submit.addEventListener('click', stopaction, false)
        function stopaction(event) {
            event.preventDefault();
        }
        
        
        alert("Please enter a ranking from 1 to 5")
    }

}