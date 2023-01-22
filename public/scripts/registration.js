$(document).ready(async () => {
    const email = document.querySelector("input[name=email]");
    const email_verification_code = document.querySelector(
        "input[name=email_verification_code]"
    );
    const send_code_verification_button = document.getElementById(
        "send-code-verification"
    );
    const password = document.querySelector("input[name=password]");
    const confirm_password = document.querySelector(
        "input[name=confirm_password]"
    );
    let verification_code = null;
    let startCountdown = null;

    const countdown = (button) => {

        const today = new Date();
        const before = new Date(Number(today.getFullYear()), Number(today.getMonth()), Number(today.getDate()), Number(localStorage.getItem("countdown").split(':')[0]), Number(localStorage.getItem("countdown").split(':')[1]), Number(localStorage.getItem("countdown").split(':')[2]), 0);
        if (today.getTime() > (before.getTime() + 60000)) {
            clearInterval(startCountdown);
            disableSendCodeVerificationButton(button, false);
            return;
        }

        disableSendCodeVerificationButton(
            button,
            true,
            Number(localStorage.getItem("countdown"))
        );
    };

    // Email Validation
    email.addEventListener("input", function () {
        if (isEmail(this.value)) {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        } else {
            send_code_verification_button.setAttribute("disabled", "");
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
            return;
        }

        if (!send_code_verification_button.classList.contains("delay")) {
            send_code_verification_button.removeAttribute("disabled");
        }
    });

    email_verification_code.addEventListener("input", function () {
        if (verification_code === this.value) {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        } else {
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
    });

    // Password Validation
    password.addEventListener("input", function () {
        if (confirm_password.value) {
            if (this.value === confirm_password.value) {
                confirm_password.classList.add("is-valid");
                confirm_password.classList.remove("is-invalid");
            } else {
                confirm_password.classList.remove("is-valid");
                confirm_password.classList.add("is-invalid");
            }
        }
    });
    confirm_password.addEventListener("input", function () {
        if (this.value === password.value) {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        } else {
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
    });

    document.querySelector("form").addEventListener("submit", (e) => {
        const phone_number = document.querySelector("input[name=phone_number]");
        if (isNaN(Number(phone_number.value))) {
            phone_number.focus();
            phone_number.classList.add("is-invalid");
        } else if (verification_code !== email_verification_code.value) {
            email_verification_code.focus();
            email_verification_code.classList.add("is-invalid");
        } else if (password.value !== confirm_password.value) {
            password.focus();
            password.classList.add("is-invalid");
        } else return;
        e.preventDefault();
    });

    send_code_verification_button.addEventListener("click", async function () {
        const today = new Date();
        localStorage.setItem("countdown", (today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()));
        disableSendCodeVerificationButton(send_code_verification_button, true);
        startCountdown = setInterval(() => {
            countdown(send_code_verification_button);
        }, 1000);
        verification_code = (await getVerificationCode(email.value))
            .verificationCode;
        console.log(verification_code)
    });

    if (localStorage.getItem("countdown")) {
        startCountdown = setInterval(() => {
            countdown(send_code_verification_button);
        }, 1000);
        disableSendCodeVerificationButton(
            send_code_verification_button,
            true,
            localStorage.getItem("countdown")
        );
    }
});
