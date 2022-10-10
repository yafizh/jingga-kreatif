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

    const countdown = () => {
        const seconds = Number(
            send_code_verification_button.innerText.split(" ")[4]
        );
        send_code_verification_button.innerText = `Kirim Ulang Kode Dalam ${
            seconds - 1
        }`;
        localStorage.setItem("countdown", seconds - 1);
        if (seconds - 1 === 0) {
            clearInterval(startCountdown);
            disableSendCodeVerificationButton(false);
        }
    };

    const getVerificationCode = async (email) => {
        return fetch(
            `${window.location.origin}/registration/verification-code/${email}`,
            {
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]'
                    ).value,
                },
            }
        ).then((response) => response.json());
    };

    const disableSendCodeVerificationButton = (isTrue, countdown = 3) => {
        if (isTrue) {
            localStorage.setItem("countdown", countdown);
            send_code_verification_button.classList.add("delay");
            send_code_verification_button.setAttribute("disabled", "");
            send_code_verification_button.innerText = `Kirim Ulang Kode Dalam ${localStorage.getItem(
                "countdown"
            )}`;
        } else {
            localStorage.removeItem("countdown");
            send_code_verification_button.classList.remove("delay");
            send_code_verification_button.removeAttribute("disabled");
            send_code_verification_button.innerText = "Kirim Kode Verifikasi";
        }
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
        disableSendCodeVerificationButton(true);
        startCountdown = setInterval(countdown, 1000);
        verification_code = (await getVerificationCode(email.value)).verificationCode;
        console.log(verification_code)
    });

    if (localStorage.getItem("countdown")) {
        startCountdown = setInterval(countdown, 1000);
        disableSendCodeVerificationButton(
            true,
            localStorage.getItem("countdown")
        );
    }
});
