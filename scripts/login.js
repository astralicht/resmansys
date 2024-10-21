let loginMessage = elem("form#login #message");

if (window.location.search != "" || window.location.search != undefined) {
    let queryStringArr = ((window.location.search).split("?")[1]).split("=");

    if (queryStringArr.includes("e") && queryStringArr.includes("auth-invalid")) {
        loginMessage.setAttribute("danger-bg", "");
        loginMessage.innerText = "Login invalid! Check your login credentials and try again.";
        loginMessage.style.display = "block";
    }
}