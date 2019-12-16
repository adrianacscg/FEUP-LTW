window.addEventListener("load", () => {

    /* GENERIC FUNCTIONS */

    const stopDefAction = e => e.preventDefault();

    // onHover
    const onHoverId = (id, pred) => {
        const elem = document.getElementById(id);
        elem.addEventListener("mouseover", pred);
    }

    const onHoverAllClassElems = (className, pred) => {
        const elems = document.getElementsByClassName(className);
        for (elem of elems) elem.addEventListener("mousover", pred);
    }

    // onClick
    const onClickAllClassElems = (className, pred) => {

        const elems = document.getElementsByClassName(className);
        for (elem of elems) elem.addEventListener("click", pred);
    }

    const onClickClassName = (className, idx, pred) => {
        const elems = document.getElementsByClassName(className);
        elems[idx].addEventListener("click", pred);
    }

    const onClickId = (id, pred) => {
        const elem = document.getElementById(id);
        elem.addEventListener("click", pred);
    }


    // createElem 
    const createElem = (tagName, attrbs = {}, txt) => {
        const elem = document.createElement(tagName);
        Object.assign(element, attributes);
        if (txt) elem.appendChild(document.createTextNode(txt));

        return elem;
    }


    // renderElem
    const renderElemBody = elem => document.body.innerHTML += elem;

    const renderElemDiv = (div, elem) => document.getElementById(div).innerHTML += (" " + elem);

    const renderElemParentTagName = (tagName, child) => {

        const parent = document.getElementByTagName(tagName);
        parent.innerHTML += child;
    }

    const renderElemParentId = (id, child) => {

        const parent = document.getElementById(id);
        parent.innerHTML += child;
    }

    const renderElemParentClassName = (className, elem) => {

        document.getElementsByClassName(className);
        parent.innerHTML += child;
    }


    // toggleClass
    const toggleClass = (elem, className) => elem.classList.contains(className) ? elem.classList.remove(className) : elem.classList.add(className)


    /* ANIMATIONS */
    const fadeOut = (elem, delay) => {
        
        let op = elem.style.opacity;

        let timer = setInterval(() => {
            if (op <= 0.1) clearInterval(timer);

            elem.style.opacity = op;
            elem.style.filter = `alpha(opacity= ${op * 100}`;

            op -= op * 0.1;
        }, delay);
    }

    const fadeIn = (elem, delay) => {
        
        let op = 0.2;

        let timer = setInterval(() => {

            if (op >= 1) clearInterval(timer)

            elem.style.opacity = op
            elem.style.filter = `alpha(opacity= ${op * 100}`

            op += op * 0.1;
        }, delay);
    }


    /* HTML TEMPLATES */

    const loginDiv = `
        <div id="login" class="hidden">
            <button class="close-button">x</button>
            <h3>Login</h3>
            <form id="idForm" method="POST" action="../actions/action_login.php">

                <label for="idEmail">Email</label>
                <input id="idEmail" type="email" name="email" autocomplete="off" required>

                <br><br>

                <label for="idPassword">Password</label>
                <input id="idPassword" type="password" name="password" autocomplete="off" required>
            

                <br><br>    

                <input id="idSubmit" name="login" type="submit" value="Login">
            </form>
        </div>
    `;


    /* PAGE RENDERS */

    renderElemParentId("slide1", loginDiv);

    let form = document.getElementById('idForm')
    form.addEventListener('submit', SubmitForm)

    function SubmitForm(event){

        let email= document.getElementById('idEmail').value     // email value
    
        //Ajax Request
        let request = new XMLHttpRequest()

        request.addEventListener("load",function(){
            

            let response= JSON.parse(this.responseText)
            

            if(response=="0"){
                alert("Email não existe!")
                event.preventDefault()
            }else{
                console.log("hello")
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

    /* CALLS TO ACTION */

    // open help window
    onClickClassName("login_button", 0, () => fadeIn(document.getElementById("login"), 10));
    onClickClassName("login_button", 0, () => document.getElementById("login").classList.remove("hidden"));

    // close help window
    onClickClassName("close-button", 0, () => fadeOut(document.getElementById("login"), 10));
    onClickClassName("close-button", 0, () => document.getElementById("login").classList.add("hidden"));

    /* Error Message*/
    
    let msg= document.getElementById('message').value
    if(msg=="Login failed!"){
        alert("Login failed!");
    }

});