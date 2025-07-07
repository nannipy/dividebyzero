const loginFormOpenBtn = document.querySelector("#login-open"),
    signupFormOpenBtn = document.querySelector("#signup-open"),
    home = document.querySelector(".home"),
    form = document.querySelector(".su_form");
    formContainer = document.querySelector(".form_container"),
    formCloseBtn = document.querySelector(".form_close"),
    signupBtn = document.querySelector("#signup"),
    loginBtn = document.querySelector("#login"),
    pwShowHide = document.querySelectorAll(".pw_hide"),

    hambuger = document.querySelector(".hamburger"),

    regBtn = document.querySelector("#reg_button");
    
    if (!location.pathname.includes("logged")) {
        emailField = form.querySelector(".email_field"),
        emailInput = emailField.querySelector(".email"),
        pswField = form.querySelector(".create_psw"),
        pswInput = pswField.querySelector(".password"),
        cpswField = form.querySelector(".confirm_psw"),
        cpswInput = cpswField.querySelector(".cpassword"),
    
        loginEmailInput = document.querySelector(".loginEmail"),
        loginPasswordInput = document.querySelector(".loginPassword");
    }

// Sticky Header
window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
});

// Hamburger menu
hambuger.onclick = function () {
    navBar = document.querySelector(".nav-bar");
    navBar.classList.toggle("active");
}

// Reg button
if (regBtn != null) {
    regBtn.addEventListener("click", () => {
        formContainer.classList.add("active");
        home.classList.add("show");
    });
}

if (!location.pathname.includes("logged")) {
    // Login banner
    loginFormOpenBtn.addEventListener("click", () => {
        formContainer.classList.remove("active");
        home.classList.add("show");
    });
    
    // Signup banner
    signupFormOpenBtn.addEventListener("click", () => {
        formContainer.classList.add("active");
        home.classList.add("show");
    });
    
    // Close button : chiusura del form e reset dei campi compilabili
    formCloseBtn.addEventListener("click", () => {
        pwShowHide.forEach(icon => {
            if (icon.classList.contains("ri-eye-line")) {
                icon.classList.replace("ri-eye-line", "ri-eye-off-line");
            }
        })
        home.classList.remove("show");
        loginEmailInput.value = "";
        loginPasswordInput.value = "";
        emailField.classList.remove("invalid");
        emailInput.value = "";
        pswField.classList.remove("invalid");
        pswInput.value = "";
        cpswField.classList.remove("invalid");
        cpswInput.value = "";
    });
    
    // Show/hide button
    pwShowHide.forEach(icon => {
        icon.addEventListener("click", () => {
            let getPWInput = icon.parentElement.querySelector("input");
            if(getPWInput.type === "password") {
                getPWInput.type = "text";
                icon.classList.replace("ri-eye-off-line", "ri-eye-line");
            } else {
                getPWInput.type = "password";
                icon.classList.replace("ri-eye-line", "ri-eye-off-line");
    
            }
            console.log(getPWInput);
        });
    });
    
    // Signup button
    signupBtn.addEventListener("click", (e) => {
        e.preventDefault();
        formContainer.classList.add("active");
    });
    
    // Login button
    loginBtn.addEventListener("click", (e) => {
        e.preventDefault();
        formContainer.classList.remove("active");
    });
    
    // Email validation : sfrutta una regex per la verifica del formato della mail
    function validaEmail() {
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if(!emailInput.value.match(emailPattern)) {
            return emailField.classList.add("invalid");
        }
        emailField.classList.remove("invalid");
    }
    
    // Password validation : sfrutta una regex per la verifica del formato della password (almeno 8 caratteri tra
    //                       numeri, simboli e lettere maiuscole e minuscole)
    function createPassword() {
        const pswPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(!pswInput.value.match(pswPattern)) {
            return pswField.classList.add("invalid");
        }
        pswField.classList.remove("invalid");
    }
    
    // Confirm password validation : controlla che il contenuto del campo non sia vuoto e corrisponda a quello di pswField
    function confirmPassword() {
        if(cpswInput.value !== pswInput.value || cpswInput.value === "") {
            return cpswField.classList.add("invalid");
        }
        cpswField.classList.remove("invalid");
    }
    
    // Signup form validation : mette insieme la verifica dinamica di ogni campo del form (in particolare, un valore in
    //                          formato errato, viene valutato nuovamente ogni volta che si tenta di modificarlo per correggerlo.)
    function validaForm() {
        validaEmail();
        createPassword();
        confirmPassword();
    
        emailInput.addEventListener("keyup", validaEmail);
        pswInput.addEventListener("keyup", createPassword);
        cpswInput.addEventListener("keyup", confirmPassword);
    
        if (!emailField.classList.contains("invalid") &&
            !pswField.classList.contains("invalid") &&
            !cpswField.classList.contains("invalid")
        ) {
            return true;
        }
        return false;
    }
}
