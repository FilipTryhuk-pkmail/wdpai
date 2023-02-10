const form = document.querySelector("form");
const email_in = form.querySelector("input[name='email']");

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function markValidation(element, condition) {
    !condition ? element.classList.add("not_valid") : element.classList.remove("not_valid");
}
function validateEmail() {
    setTimeout(function(){
        markValidation(email_in, isEmail(email_in.value))
    }, 1000);
}

email_in.addEventListener("keyup", validateEmail);


