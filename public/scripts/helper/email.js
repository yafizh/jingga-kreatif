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
        const today = new Date();
        const a = localStorage.getItem("countdown").split(':')[0];
        const b = localStorage.getItem("countdown").split(':')[1];
        const c = localStorage.getItem("countdown").split(':')[2];
        const e = ((Number(a) * 60 * 60) + ((Number(b) + 1) * 60) + Number(c)) - ((Number(today.getHours()) * 60 * 60) + (Number(today.getMinutes()) * 60) + Number(today.getSeconds()));
        button.classList.add("delay");
        button.setAttribute("disabled", "");
        button.innerText = `Kirim Ulang Kode Dalam ${e}`;
        return;
    }

    localStorage.removeItem("countdown");
    button.classList.remove("delay");
    button.removeAttribute("disabled");
    button.innerText = "Kirim Kode Verifikasi";
};
