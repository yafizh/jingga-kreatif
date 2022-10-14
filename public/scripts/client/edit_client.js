$(document).ready(async () => {
    const email = document.querySelector("input[name=email]");
    const email_verification_code = document.querySelector(
        "input[name=email_verification_code]"
    );
    const send_code_verification_button = document.getElementById(
        "send-code-verification"
    );
    const submit_email_form_btn = document.getElementById(
        "submit-email-form-btn"
    );
    let verification_code = null;
    let startCountdown = null;
    const oldEmail = email.value;

    const countdown = (button) => {
        localStorage.setItem(
            "countdown",
            Number(localStorage.getItem("countdown")) - 1
        );
        if (Number(localStorage.getItem("countdown")) < 1) {
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
        if (this.value == oldEmail) {
            this.classList.remove("is-valid");
            this.classList.remove("is-invalid");
            send_code_verification_button.setAttribute("disabled", "");
            return;
        } else if (isEmail(this.value)) {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        } else {
            send_code_verification_button.setAttribute("disabled", "");
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
            return;
        }

        if (!send_code_verification_button.classList.contains("delay"))
            send_code_verification_button.removeAttribute("disabled");
    });

    email_verification_code.addEventListener("input", function () {
        if (verification_code === this.value) {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            submit_email_form_btn.removeAttribute("disabled");
        } else {
            submit_email_form_btn.setAttribute("disabled", "");
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
    });

    send_code_verification_button.addEventListener("click", async function () {
        disableSendCodeVerificationButton(send_code_verification_button, true);
        startCountdown = setInterval(() => {
            countdown(send_code_verification_button);
        }, 1000);
        verification_code = (await getVerificationCode(email.value))
            .verificationCode;
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

    if (document.querySelector(".toast")) {
        new bootstrap.Toast(document.querySelector(".toast"), {
            animation: true,
            autohide: true,
            delay: 2000,
        }).show();
    }
});
