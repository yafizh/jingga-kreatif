const input_nik = document.getElementById("nik");
const input_name = document.getElementById("name");
const input_birthplace = document.getElementById("birthplace");
const input_birthdate = document.getElementById("birthdate");
const input_father_name = document.getElementById("father_name");
const input_mother_name = document.getElementById("mother_name");
const input_photo = document.getElementById("photo");
const input_documents = document.getElementById("documents");

const btn_upload_photo = document.getElementById("btn-upload-photo");
const btn_upload_documents = document.getElementById("btn-upload-documents");

btn_upload_photo.addEventListener("click", function () {
    input_photo.click();
});

input_photo.addEventListener("change", function () {
    document.querySelector("#upload-photo h5").innerText = "Gambar Terpilih";
    const [file] = this.files;
    document.querySelector(
        "#upload-photo p"
    ).innerHTML = `<a href='${URL.createObjectURL(
        file
    )}' target='_blank'>Lihat Gambar</a>`;
});

btn_upload_documents.addEventListener("click", function () {
    input_documents.click();
});

input_documents.addEventListener("change", function () {
    document.querySelector("#upload-documents p").innerText = "";
    document.querySelector("#upload-documents h5").innerText =
        "Dokumen Terpilih";
    for (let i = 0; i < this.files.length; i++) {
        document
            .querySelector("#upload-documents p")
            .insertAdjacentHTML(
                "beforeend",
                `<a class='d-block mb-1' href='${URL.createObjectURL(
                    this.files[i]
                )}' target='_blank'>Lihat Dokumen ${i + 1}</a>`
            );
    }
});
