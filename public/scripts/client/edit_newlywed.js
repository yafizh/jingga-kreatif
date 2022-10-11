const input_photo = document.getElementById("photo");

const btn_upload_photo = document.getElementById("btn-upload-photo");

btn_upload_photo.addEventListener("click", function () {
    input_photo.click();
});

input_photo.addEventListener("change", function () {
    const [file] = this.files;
    document.getElementById(
        "preview-upload-photo"
    ).innerHTML = `<a href='${URL.createObjectURL(
        file
    )}' target='_blank'>Lihat Gambar</a>`;
});

if (document.querySelector(".toast")) {
    new bootstrap.Toast(document.querySelector(".toast"), {
        animation: true,
        autohide: true,
        delay: 2000,
    }).show();
}
