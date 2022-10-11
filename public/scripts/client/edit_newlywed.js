const input_photo = document.getElementById("photo");
const input_documents = document.getElementById("documents");

const btn_upload_photo = document.getElementById("btn-upload-photo");
const btn_upload_documents = document.getElementById("btn-upload-documents");

btn_upload_photo.addEventListener("click", function () {
    input_photo.click();
});

btn_upload_documents.addEventListener("click", function () {
    input_documents.click();
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

input_documents.addEventListener("change", function () {
    console.log(document.querySelector("#upload-documents p"));
    if (document.querySelector("#upload-documents p#no-document"))
        document.querySelector("#upload-documents p#no-document").remove();
    document.querySelector("#upload-documents p#new-document").innerText = "";
    document.querySelector("#upload-documents h5").innerText =
        "Dokumen Terpilih";

    if (document.querySelectorAll(".btn-delete").length) {
        const hr = document.createElement("hr");
        document
            .querySelector("#upload-documents")
            .insertBefore(
                hr,
                document.querySelector("#upload-documents p#new-document")
            );
    }

    for (let i = 0; i < this.files.length; i++) {
        document
            .querySelector("#upload-documents #new-document")
            .insertAdjacentHTML(
                "beforeend",
                `<a class='d-block mb-1' href='${URL.createObjectURL(
                    this.files[i]
                )}' target='_blank'>Lihat Dokumen ${i + 1} (Baru)</a>`
            );
    }
});

if (document.querySelector(".toast")) {
    new bootstrap.Toast(document.querySelector(".toast"), {
        animation: true,
        autohide: true,
        delay: 2000,
    }).show();
}
document.querySelectorAll(".btn-delete").forEach((button, index) => {
    button.addEventListener("click", function () {
        this.parentNode.remove();

        document.querySelectorAll('input[name="state_old_documents[]"]')[index].value = 'delete';

        if (!document.querySelectorAll(".btn-delete").length) {
            document.querySelector("#upload-documents h5").innerText =
                "Pilih Dokumen";

            const p = document.createElement("p");
            p.setAttribute("id", "no-document");
            p.classList.add("p-3");
            p.innerText =
                "Upload dokumen tambahan jika ada di sini dengan menekan tombol Pilih Dokumen";
            document
                .querySelector("#upload-documents")
                .insertBefore(
                    p,
                    document.querySelector("#btn-upload-documents")
                );
        }
    });
});

document.querySelectorAll(".btn-edit").forEach((button, index) => {
    document
        .querySelectorAll('input[name="old_documents[]"]')
        [index].addEventListener("change", function () {
            document
                .querySelectorAll("#upload-documents .btn-detail")
                [index].setAttribute(
                    "href",
                    `${URL.createObjectURL(this.files[0])}`
                );
            document.querySelectorAll("#upload-documents p")[
                index
            ].innerText = `${
                document.querySelectorAll("#upload-documents p")[index]
                    .innerText
            } (Baru)`;
        });

    button.addEventListener("click", () => {
        document
            .querySelectorAll('input[name="old_documents[]"]')
            [index].click();
    });
});
