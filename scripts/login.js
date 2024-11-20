// let loginMessage = elem("form#login #message");

// if (window.location.search != "") {
//     let queryStringArr = ((window.location.search).split("?")[1]).split("=");

//     if (queryStringArr.includes("e") && queryStringArr.includes("auth-invalid")) {
//         loginMessage.setAttribute("danger-bg", "");
//         loginMessage.innerText = "Login invalid! Check your login credentials and try again.";
//         loginMessage.style.display = "block";
//     } else if (queryStringArr.includes("e") && queryStringArr.includes("auth-required")) {
//         loginMessage.setAttribute("alert-bg", "");
//         loginMessage.innerText = "Please login to continue.";
//         loginMessage.style.display = "block";
//     } else if (queryStringArr.includes("e") && queryStringArr.includes("server-error")) {
//         loginMessage.setAttribute("warning-bg", "");
//         loginMessage.innerText = "Server error encountered. Please try again in a few minutes.";
//         loginMessage.style.display = "block";
//     }
// }

let loginForm = elem("form#login");
let loginMessage = elem("form#login #message");

loginForm.onsubmit = (element) => {
    element.preventDefault();

    let username = elem("form#login input#username").value;
    let password = elem("form#login input#password").value;
    
    asyncFetch(
        "auth.php",
        "POST",
        {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        new URLSearchParams({
            "username": username,
            "password": password,
        }),
    ).then(response => {
        switch (response["status"]) {
            case "200":
                // code for auth success
                window.location.href = "/dashboard.php";
                break;
            case "401":
                // code for invalid auth
                console.log(response["message"])
                break;
            case "500":
                // code for server error
                console.log(response["message"])
                break;
        }
    });
}