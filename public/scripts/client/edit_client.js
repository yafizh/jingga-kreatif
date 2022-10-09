const input_email = document.querySelector("input[name=email]");
const input_email_verification = document.querySelector(
    "input[name=email_verification]"
);
const verif_code_button = document.getElementById("verif-code-btn");
const submit_button = document.getElementById("submit-btn");
let verif_code = null;

input_email.addEventListener("input", function () {
    if (
        this.value &&
        isEmail(this.value) &&
        !verif_code_button.classList.contains("delay")
    ) {
        verif_code_button.removeAttribute("disabled");
        return;
    }

    verif_code_button.setAttribute("disabled", "");
});

input_email_verification.addEventListener("input", function () {
    if (verif_code === this.value) {
        this.classList.add("is-valid");
        this.classList.remove("is-invalid");
        submit_button.removeAttribute("disabled");
        submit_button.removeAttribute("disabled");
    } else {
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
        submit_button.setAttribute("disabled", "");
    }
});

verif_code_button.addEventListener("click", function () {
    verif_code_button.toggleAttribute("disabled");
    verif_code_button.classList.toggle("loading");
    verif_code_button.classList.toggle("delay");
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
                    verif_code_button.classList.toggle("delay");
                    clearInterval(refreshIntervalId);
                    verif_code_button.innerText = "Kirim Kode Verifikasi";
                }
            }, 1000);
        });
});
