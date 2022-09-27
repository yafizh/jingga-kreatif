const input_name = document.querySelector("input[name=name]");
const input_phone_number = document.querySelector("input[name=phone_number]");
const input_email = document.querySelector("input[name=email]");
const input_email_verification = document.querySelector(
    "input[name=email_verification]"
);
const input_password = document.querySelector("input[name=password]");
const input_confirm_password = document.querySelector(
    "input[name=confirm_password]"
);
const verif_code_button = document.getElementById("verif-code-btn");

let verif_code = null;

input_name.addEventListener("input", function () {
    if (this.value) {
        this.classList.add("is-valid");
        this.classList.remove("is-invalid");
    } else {
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
    }
});

input_phone_number.addEventListener("input", function () {
    if (this.value) {
        this.classList.add("is-valid");
        this.classList.remove("is-invalid");
    } else {
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
    }
});

input_email.addEventListener("input", function () {
    if (this.value && isEmail(this.value)) {
        verif_code_button.removeAttribute("disabled");
        this.classList.add("is-valid");
        this.classList.remove("is-invalid");
    } else {
        verif_code_button.setAttribute("disabled", "");
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
    }
});

input_email_verification.addEventListener("input", function () {
    if (verif_code === this.value) {
        this.classList.add("is-valid");
        this.classList.remove("is-invalid");
    } else {
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
    }
});

input_password.addEventListener("input", function () {
    if (input_confirm_password.value) {
        if (this.value === input_confirm_password.value) {
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        } else {
            this.classList.remove("is-valid");
            this.classList.add("is-invalid");
        }
    }
});

input_confirm_password.addEventListener("input", function () {
    if (this.value === input_password.value) {
        this.classList.add("is-valid");
        this.classList.remove("is-invalid");
    } else {
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
    }
});

document
    .querySelector("#registration-form")
    .addEventListener("submit", function (e) {
        if (input_name.classList.contains("is-invalid") || !input_name.value)
            input_name.focus();
        else if (
            input_phone_number.classList.contains("is-invalid") ||
            !input_phone_number.value
        )
            input_phone_number.focus();
        else if (
            input_email.classList.contains("is-invalid") ||
            !input_email.value
        )
            input_email.focus();
        else if (
            input_email_verification.classList.contains("is-invalid") ||
            !input_email_verification.value
        )
            input_email_verification.focus();
        else if (
            input_password.classList.contains("is-invalid") ||
            !input_password.value
        )
            input_password.focus();
        else if (
            input_confirm_password.classList.contains("is-invalid") ||
            !input_confirm_password.value
        )
            input_confirm_password.focus();
        else return;

        e.preventDefault();
    });

verif_code_button.addEventListener("click", function () {
    verif_code_button.toggleAttribute("disabled");
    verif_code_button.classList.toggle("loading");
    verif_code_button.innerText = "";

    $.ajax({
        url: `${window.location.origin}/dashboard/mail/send`,
        method: "POST",
        dataType: "json",
        data: {
            email: document.querySelector("input[name=email]").value,
        },
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').val(),
        },
    })
        .done(function (response) {
            verif_code = response.Uuid;
        })
        .fail(function (e) {
            console.log(e);
            alert("error");
        })
        .always(function () {
            verif_code_button.classList.toggle("loading");
            verif_code_button.innerText = `Kirim Ulang Kode Dalam ${60}`;
            const refreshIntervalId = setInterval(function () {
                let a = verif_code_button.innerText.split(" ");
                const seconds = parseInt(a[a.length - 1]);
                verif_code_button.innerText = `Kirim Ulang Kode Dalam ${
                    seconds - 1
                }`;

                if (seconds - 1 === 0) {
                    verif_code_button.toggleAttribute("disabled");
                    clearInterval(refreshIntervalId);
                    verif_code_button.innerText = "Kirim Kode Verifikasi";
                }
            }, 1000);
        });
});
