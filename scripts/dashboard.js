let currentVisiblePage = elem(`div.spa-content-container div#tables`);
currentVisiblePage.style.display = "block";
currentVisiblePage.style.opacity = "1";

let currentActiveNavButton = elem("div#spa-menu button.spa-nav-button#tables");

Array.from(elems("div#spa-menu button.spa-nav-button")).forEach(button => {
    button.onclick = ()=>{
        currentActiveNavButton.removeAttribute("active");
        button.setAttribute("active", "");
        currentActiveNavButton = button;
        fadeOut(currentVisiblePage);
        setTimeout(()=>{
            currentVisiblePage = elem(`div.spa-content-container div#${button.id}`);
            fadeIn(currentVisiblePage);
        }, 150);
    }
})


// Reservations Partial
let resDateFilter = elem("input#res-date-filter");
resDateFilter.valueAsDate = new Date();

function fetchReservations() {
    sendRequest(`api.php/reservations?date=${resDateFilter.value}`, "GET", {"Content-Type": "application/json"}, undefined, resToConsole);
}

function resToConsole(res) {
    let reservations = res["body"];

    if (reservations.length != 0) {
        reservations.forEach(entry => {
            console.log(entry["name"]);
        })
    }
}