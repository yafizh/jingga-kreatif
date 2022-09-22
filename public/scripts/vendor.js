$(document).on("click", "button.choose", function () {
    if (this.classList.contains("choosed")) {
        this.innerHTML = "Pilih Vendor";
        toastGenerator((choose = 0));
    } else {
        toastGenerator((choose = 1));
        this.innerHTML = "Vendor Terpilih";
    }
    this.classList.toggle("btn-outline-primary");
    this.classList.toggle("btn-primary");
    this.classList.toggle("choosed");
});

function toastGenerator(
    choose = 1,
    name = "Galathia Decor",
    jenis_vendor = "Dekorasi",
) {
    const toast = document.createElement("div");
    toast.classList.add("toast");
    toast.classList.add("align-items-center");
    toast.style.width = "fit-content";

    if (choose) {
        toast.classList.add("bg-primary");
        toast.classList.add("text-white");
    } else {
        toast.classList.add("bg-danger");
        toast.classList.add("text-white");
    }

    toast.setAttribute("role", "alert");
    toast.setAttribute("aria-live", "assertive");
    toast.setAttribute("aria-atomic", "true");

    const toastContainer = document.createElement("div");
    toastContainer.classList.add("d-flex");

    const toastBody = document.createElement("div");
    toastBody.classList.add("toast-body");
    toastBody.innerHTML = choose
        ? `Berhasil memilih <strong>${name}</strong> sebagai vendor <strong>${jenis_vendor}</strong>`
        : `Berhasil membatalkan <strong>${name}</strong> sebagai vendor <strong>${jenis_vendor}</strong>`;

    const toastButton = document.createElement("button");
    toastButton.classList.add("btn-close");
    toastButton.classList.add("btn-close-white");
    toastButton.classList.add("me-2");
    toastButton.classList.add("m-auto");

    toastButton.setAttribute("type", "button");
    toastButton.setAttribute("data-bs-dismiss", "toast");
    toastButton.setAttribute("aria-label", "Close");

    toastContainer.append(toastBody);
    toastContainer.append(toastButton);
    toast.append(toastContainer);

    document.querySelector(".toast-container").append(toast);
    new bootstrap.Toast(toast, {
        animation: true,
        autohide: true,
        delay: 3000,
    }).show();
}
