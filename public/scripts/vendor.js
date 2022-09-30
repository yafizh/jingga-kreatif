let choosedVendor = [];

const toastGenerator = (
    choose = 1,
    vendor_name = "Galathia Decor",
    jenis_vendor = "Dekorasi"
) => {
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
        ? `Berhasil memilih <strong>${vendor_name}</strong> sebagai vendor <strong>${jenis_vendor}</strong>`
        : `Berhasil membatalkan <strong>${vendor_name}</strong> sebagai vendor <strong>${jenis_vendor}</strong>`;

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
};

const vendorGenerator = (vendors) => {
    const container = document.createElement("div");
    container.classList.add("mb-3");

    const title = document.createElement("h4");
    title.classList.add("mb-3");
    title.innerText = vendors[0].vendor_type_name;

    const card_container = document.createElement("div");
    card_container.classList.add("d-flex");
    card_container.classList.add("gap-3");
    card_container.classList.add("flex-wrap");
    card_container.classList.add("justify-content-start");

    vendors.forEach((vendor) => {
        const card = document.createElement("div");
        card.classList.add("card");

        const card_image = document.createElement("div");
        card_image.classList.add("card-image");

        const img = document.createElement("img");
        img.setAttribute(
            "src",
            `${window.location.origin}/storage/${vendor.logo}`
        );

        const overplay = document.createElement("div");
        overplay.classList.add("overplay");

        const vendor_name = document.createElement("h5");
        vendor_name.innerText = vendor.name;

        const vendor_price = document.createElement("h6");
        vendor_price.innerText = `Rp ${rupiahFormat(vendor.price)}`;

        overplay.append(vendor_name);
        overplay.append(vendor_price);

        const card_body = document.createElement("div");
        card_body.classList.add("card-body");
        card_body.classList.add("pt-0");

        const choose_button = document.createElement("button");
        choose_button.classList.add("choose");
        choose_button.classList.add("btn");
        choose_button.classList.add("btn-outline-primary");
        choose_button.classList.add("btn-sm");
        choose_button.classList.add("w-100");
        choose_button.classList.add("my-2");
        choose_button.innerText = "Pilih Vendor";

        choose_button.addEventListener("click", function () {
            if (this.classList.contains("choosed")) {
                choosedVendor.splice(choosedVendor.indexOf(vendor.id), 1);
                this.innerHTML = "Pilih Vendor";
                toastGenerator(
                    (choose = 0),
                    (vendor_name = vendor.name),
                    (jenis_vendor = vendor.vendor_type_name)
                );
            } else {
                choosedVendor.push(vendor.id);
                toastGenerator(
                    (choose = 1),
                    (vendor_name = vendor.name),
                    (jenis_vendor = vendor.vendor_type_name)
                );
                this.innerHTML = "Vendor Terpilih";
            }
            this.classList.toggle("btn-outline-primary");
            this.classList.toggle("btn-primary");
            this.classList.toggle("choosed");

            document.querySelector("#choosed_vendor").value =
                choosedVendor.toString();
        });

        const detail_button = document.createElement("button");
        detail_button.classList.add("btn");
        detail_button.classList.add("btn-outline-primary");
        detail_button.classList.add("btn-sm");
        detail_button.classList.add("w-100");
        detail_button.innerText = "Lihat Detail";

        card_body.append(choose_button);
        card_body.append(detail_button);

        card_image.append(img);
        card_image.append(overplay);

        card.append(card_image);
        card.append(card_body);

        card_container.append(card);
    });

    container.append(title);
    container.append(card_container);

    document.querySelector("#grid-container").append(container);
};
$.ajax({
    url: `${window.location.origin}/dashboard/vendor/getCategorizedVendor`,
    method: "GET",
    dataType: "json",
})
    .done(function (response) {
        console.log(response);
        response.vendor_type_id.forEach((vendor_type_id) => {
            vendorGenerator(response.vendor[vendor_type_id]);
        });
    })
    .fail(function (e) {
        console.log(e);
        alert("error");
    });
