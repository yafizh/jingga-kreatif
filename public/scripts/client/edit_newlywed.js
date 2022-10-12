const input_photo = document.getElementById("photo");
const input_documents = document.getElementById("documents");

const new_documents_container = document.getElementById(
    "new-document-container"
);

const cardDocumentGenerator = (file) => {
    const container = document.createElement("div");
    container.classList.add("mb-3", "border", "rounded", "py-3");

    const p = document.createElement("p");
    p.innerText = "Dokumen Baru";

    const flex_container = document.createElement("div");
    flex_container.classList.add("d-flex", "justify-content-center", "gap-1");
    const button_detail = document.createElement("a");
    button_detail.setAttribute("href", `${URL.createObjectURL(file)}`);
    button_detail.setAttribute("target", "_blank");
    button_detail.classList.add("btn", "btn-sm", "btn-info", "text-white");
    button_detail.innerText = "Lihat";

    container.append(p);
    flex_container.append(button_detail);
    container.append(flex_container);

    return container;
};

document
    .getElementById("btn-upload-photo")
    .addEventListener("click", () => input_photo.click());
document
    .getElementById("btn-upload-documents")
    .addEventListener("click", () => input_documents.click());

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
    if (document.querySelector("#upload-documents p#no-document"))
        document.querySelector("#upload-documents p#no-document").remove();

    document.querySelector("#upload-documents h5").innerText =
        "Dokumen Terpilih";

    new_documents_container.innerText = "";

    if (document.querySelectorAll(".btn-delete").length)
        new_documents_container.innerHTML = "<hr>";

    for (const file of this.files)
        new_documents_container.append(cardDocumentGenerator(file));
});

document.querySelectorAll(".btn-delete").forEach((button, index) => {
    button.addEventListener("click", function () {
        this.parentNode.parentNode.remove();

        document.querySelectorAll('input[name="state_old_documents[]"]')[
            index
        ].value = "delete";

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
            document.querySelectorAll('input[name="state_old_documents[]"]')[
                index
            ].value = "edit";

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

if (document.querySelector(".toast")) {
    new bootstrap.Toast(document.querySelector(".toast"), {
        animation: true,
        autohide: true,
        delay: 2000,
    }).show();
}
