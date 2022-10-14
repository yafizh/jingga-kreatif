const getVerificationCode = async (email) => {
    return fetch(
        `${window.location.origin}/registration/verification-code/${email}`,
        {
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                    .value,
            },
        }
    ).then((response) => response.json());
};

const disableSendCodeVerificationButton = (button, isTrue, countdown = 60) => {
    if (isTrue) {
        localStorage.setItem("countdown", countdown);
        button.classList.add("delay");
        button.setAttribute("disabled", "");
        button.innerText = `Kirim Ulang Kode Dalam ${localStorage.getItem(
            "countdown"
        )}`;
        return;
    }

    localStorage.removeItem("countdown");
    button.classList.remove("delay");
    button.removeAttribute("disabled");
    button.innerText = "Kirim Kode Verifikasi";
};
