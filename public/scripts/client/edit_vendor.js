const choosed_theme_input = document.querySelector("#choosed_theme");
const choosed_vendor_input = document.querySelector("#choosed_vendor");
let choosedVendor = choosed_vendor_input.value.split(",").map((i) => Number(i));
let choosedTheme = choosed_theme_input.value;
let total_price = Number(document.querySelector("#total_price").innerText.split(' ')[2].replaceAll('.',''));
const toastGenerator = (choose = 1, name, type) => {
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
        ? `Berhasil memilih <strong>${name}</strong> sebagai <strong>${type}</strong>`
        : `Berhasil membatalkan <strong>${name}</strong> sebagai <strong>${type}</strong>`;

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
    container.classList.add("row", "mb-3");

    const title = document.createElement("h4");
    title.classList.add("col-12", "mb-3");
    title.innerText = vendors[0].vendor_type_name;

    container.append(title);

    vendors.forEach((vendor) => {
        const card_container = document.createElement("div");
        card_container.classList.add(
            "col-12",
            "col-sm-4",
            "col-md-3",
            "col-xl-2",
            "mb-3"
        );

        const card = document.createElement("div");
        card.classList.add("card", "h-100", "m-auto");

        const card_image = document.createElement("div");
        card_image.classList.add("card-image");

        const img = document.createElement("img");
        img.setAttribute(
            "src",
            `${window.location.origin}/storage/${vendor.logo}`
        );

        const card_body = document.createElement("div");
        card_body.classList.add(
            "card-body",
            "d-flex",
            "justify-content-between",
            "flex-column"
        );

        const card_title = document.createElement("div");
        card_title.classList.add("card-title", "text-center");

        const vendor_name = document.createElement("h5");
        vendor_name.innerText = vendor.name;

        const vendor_price = document.createElement("h6");
        vendor_price.classList.add("text-muted");
        vendor_price.innerText = `Rp ${rupiahFormat(vendor.price)}`;

        card_title.append(vendor_name);
        card_title.append(vendor_price);

        const choose_button = document.createElement("button");
        choose_button.classList.add("choose");
        choose_button.classList.add("btn");
        choose_button.classList.add("btn-sm");
        choose_button.classList.add("w-100");
        choose_button.classList.add("my-2");
        if (choosedVendor.includes(vendor.id)) {
            choose_button.classList.add("btn-primary");
            choose_button.classList.add("choosed");
            choose_button.innerText = "Vendor Terpilih";
        } else {
            choose_button.classList.add("btn-outline-primary");
            choose_button.innerText = "Pilih Vendor";
        }

        const button_container = document.createElement("div");

        choose_button.addEventListener("click", function () {
            if (this.classList.contains("choosed")) {
                choosedVendor.splice(choosedVendor.indexOf(vendor.id), 1);
                this.innerHTML = "Pilih Vendor";
                toastGenerator(
                    (choose = 0),
                    (name = vendor.name),
                    (type = `Vendor ${vendor.vendor_type_name}`)
                );
                total_price -= vendor.price;
            } else {
                choosedVendor.push(vendor.id);
                toastGenerator(
                    (choose = 1),
                    (name = vendor.name),
                    (type = `Vendor ${vendor.vendor_type_name}`)
                );
                this.innerHTML = "Vendor Terpilih";
                total_price += vendor.price;
            }
            this.classList.toggle("btn-outline-primary");
            this.classList.toggle("btn-primary");
            this.classList.toggle("choosed");

            choosed_vendor_input.value = choosedVendor.toString();

            document.getElementById(
                "total_price"
            ).innerText = `Total: Rp ${rupiahFormat(total_price)}`;
        });

        const detail_button = document.createElement("button");
        detail_button.classList.add("btn");
        detail_button.classList.add("btn-outline-primary");
        detail_button.classList.add("btn-sm");
        detail_button.classList.add("w-100");
        detail_button.innerText = "Lihat Detail";

        detail_button.addEventListener("click", function () {
            vendor.vendorImages.forEach(function (image, index) {
                if (!index)
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item active">
                        <img src="${window.location.origin}/storage/${image.image}" style="height:320px; object-fit: cover;" class="d-block w-100">
                    </div>
                    `);
                else
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item">
                        <img src="${window.location.origin}/storage/${image.image}" style="height:320px; object-fit: cover;" class="d-block w-100">
                    </div>
                    `);
            });
            $("#detailModal .modal-title").text(vendor.name);
            $("#detailModal .modal-body .description").text(vendor.description);

            $("#detailModal").modal("show");
        });

        button_container.append(choose_button);
        button_container.append(detail_button);

        card_body.append(card_title);
        card_body.append(button_container);

        card_image.append(img);

        card.append(card_image);
        card.append(card_body);
        card_container.append(card);

        container.append(card_container);
    });
    document.querySelector("#grid-container").append(container);
};

const themeGenerator = (themes) => {
    const choose_button_collection = [];

    const container = document.createElement("div");
    container.classList.add("row", "mb-3");

    const title = document.createElement("h4");
    title.classList.add("col-12", "mb-3");
    title.innerText = "Konsep";

    container.append(title);

    themes.forEach((theme) => {
        const card_container = document.createElement("div");
        card_container.classList.add(
            "col-12",
            "col-sm-4",
            "col-md-3",
            "col-xl-2",
            "mb-3"
        );

        const card = document.createElement("div");
        card.classList.add("card", "h-100", "m-auto");

        const card_image = document.createElement("div");
        card_image.classList.add("card-image");

        const img = document.createElement("img");
        img.setAttribute(
            "src",
            `${window.location.origin}/storage/${theme.thumbnail}`
        );

        const card_body = document.createElement("div");
        card_body.classList.add(
            "card-body",
            "d-flex",
            "justify-content-between",
            "flex-column"
        );

        const card_title = document.createElement("div");
        card_title.classList.add("card-title", "text-center");

        const inner_title = document.createElement("h5");
        inner_title.innerText = theme.name;

        card_title.append(inner_title);

        const button_container = document.createElement("div");
        const choose_button = document.createElement("button");
        if (choosedTheme == theme.id) {
            choose_button.classList.add(
                "choose",
                "btn",
                "btn-primary",
                "btn-sm",
                "w-100",
                "mb-2"
            );
            choose_button.innerText = "Konsep Terpilih";
        } else {
            choose_button.classList.add(
                "choose",
                "btn",
                "btn-outline-primary",
                "btn-sm",
                "w-100",
                "mb-2"
            );
            choose_button.innerText = "Pilih Konsep";
        }
        choose_button_collection.push(choose_button);

        const detail_button = document.createElement("button");
        detail_button.classList.add(
            "btn",
            "btn-outline-primary",
            "btn-sm",
            "w-100"
        );
        detail_button.innerText = "Lihat Detail";

        detail_button.addEventListener("click", function () {
            theme.theme_images.forEach(function (image, index) {
                if (!index)
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item active">
                        <img src="${window.location.origin}/storage/${image.image}" style="height:320px; object-fit: cover;" class="d-block w-100">
                    </div>
                    `);
                else
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item">
                        <img src="${window.location.origin}/storage/${image.image}" style="height:320px; object-fit: cover;" class="d-block w-100">
                    </div>
                    `);
            });
            $("#detailModal .modal-title").text(theme.name);
            $("#detailModal .modal-body .description").text(theme.description);

            $("#detailModal").modal("show");
        });

        button_container.append(choose_button);
        button_container.append(detail_button);

        card_body.append(card_title);
        card_body.append(button_container);

        card_image.append(img);

        card.append(card_image);
        card.append(card_body);
        card_container.append(card);

        container.append(card_container);
    });

    choose_button_collection.forEach((choose_button, index) => {
        choose_button.addEventListener("click", function () {
            choose_button_collection.forEach(function (value) {
                value.innerHTML = "Pilih Konsep";
                value.classList.remove("btn-primary");
                value.classList.add("btn-outline-primary");
            });
            this.innerHTML = "Konsep Terpilih";
            this.classList.remove("btn-outline-primary");
            this.classList.add("btn-primary");
            choosed_theme_input.value = themes[index].id;
            toastGenerator(
                (choose = 1),
                (name = themes[index].name),
                (type = "Konsep")
            );
        });
    });

    document.querySelector("#grid-container").append(container);
};

$("#detailModal").on("hidden.bs.modal", () => {
    $("#detailModal #carouselDetailModalControls .carousel-inner").text("");
    $("#detailModal .modal-title").text("");
    $("#detailModal .modal-body .description").text("");
});

$.ajax({
    url: `${window.location.origin}/theme/getCategorizedTheme`,
    method: "GET",
    dataType: "json",
})
    .done((response) => themeGenerator(response))
    .fail(function (e) {
        console.log(e);
        alert("error");
    });

$.ajax({
    url: `${window.location.origin}/vendor/getCategorizedVendor`,
    method: "GET",
    dataType: "json",
})
    .done(function (response) {
        response.vendor_type_id.forEach((vendor_type_id) => {
            vendorGenerator(response.vendor[vendor_type_id]);
        });
    })
    .fail(function (e) {
        console.log(e);
        alert("error");
    });
