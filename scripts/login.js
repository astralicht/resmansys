let loginMessage = elem("form#login #message");

if (window.location.search != "") {
    let queryStringArr = ((window.location.search).split("?")[1]).split("=");

    if (queryStringArr.includes("e") && queryStringArr.includes("auth-invalid")) {
        loginMessage.setAttribute("danger-bg", "");
        loginMessage.innerText = "Login invalid! Check your login credentials and try again.";
        loginMessage.style.display = "block";
    } else if (queryStringArr.includes("e") && queryStringArr.includes("auth-required")) {
        loginMessage.setAttribute("alert-bg", "");
        loginMessage.innerText = "Please login to continue.";
        loginMessage.style.display = "block";
    } else if (queryStringArr.includes("e") && queryStringArr.includes("server-error")) {
        loginMessage.setAttribute("warning-bg", "");
        loginMessage.innerText = "Server error encountered. Please try again in a few minutes.";
        loginMessage.style.display = "block";
    }
}