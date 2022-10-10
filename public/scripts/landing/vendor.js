const themeCardGenerator = (themes) => {
    const container = document.createElement("div");
    container.classList.add("col-12", "mb-5");

    const row = document.createElement("div");
    row.classList.add("row", "justify-content-center");

    const col_title = document.createElement("h3");
    col_title.classList.add("col-12", "text-center", "mb-3");
    col_title.innerText = "Konsep";

    row.append(col_title);
    themes.forEach((theme) => {
        const col_card = document.createElement("div");
        col_card.classList.add("col-6", "col-sm-4", "col-xl-2", "mb-3");

        const card = document.createElement("div");
        card.classList.add("card");

        const card_image = document.createElement("div");
        card_image.classList.add("card-image");
        const image = document.createElement("img");
        image.setAttribute(
            "src",
            `${window.location.origin}/storage/${theme.thumbnail}`
        );

        const card_body = document.createElement("div");
        card_body.classList.add("card-body");

        const card_title = document.createElement("div");
        card_title.classList.add("card-title", "mb-3");

        const title = document.createElement("h5");
        title.innerText = theme.name;

        const detail_button = document.createElement("button");
        detail_button.classList.add(
            "btn",
            "btn-outline-primary",
            "btn-sm",
            "w-100"
        );
        detail_button.innerText = "Lihat Detail";

        detail_button.addEventListener("click", () => {
            theme.theme_images.forEach((theme_image, index) => {
                if (!index) {
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item active">
                        <img src="${window.location.origin}/storage/${theme_image.image}" class="d-block w-100">
                    </div>
                    `);
                } else {
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item">
                        <img src="${window.location.origin}/storage/${theme_image.image}" class="d-block w-100">
                    </div>
                `);
                }
            });

            $("#detailModal .modal-title").text(theme.name);
            $("#detailModal .description").append(theme.description);
            $("#detailModal").modal("show");
        });

        card_image.append(image);

        card_title.append(title);
        card_body.append(card_title);
        card_body.append(detail_button);

        card.append(card_image);
        card.append(card_body);

        col_card.append(card);

        row.append(col_card);
    });
    container.append(row);

    return container;
};

const vendorCardGenerator = (vendors) => {
    const container = document.createElement("div");
    container.classList.add("col-12", "col-lg-5", "mb-5");

    const row = document.createElement("div");
    row.classList.add("row", "justify-content-center");

    const col_title = document.createElement("h3");
    col_title.classList.add("col-12", "text-center", "mb-3");
    col_title.innerText = vendors[0].vendor_type_name;

    row.append(col_title);
    vendors.forEach((vendor) => {
        const col_card = document.createElement("div");
        col_card.classList.add(
            "col-6",
            "col-sm-4",
            "col-md-3",
            "col-lg-5",
            "col-xxl-4",
            "mb-3"
        );

        const card = document.createElement("div");
        card.classList.add("card");

        const card_image = document.createElement("div");
        card_image.classList.add("card-image");
        const image = document.createElement("img");
        image.setAttribute(
            "src",
            `${window.location.origin}/storage/${vendor.logo}`
        );

        const card_body = document.createElement("div");
        card_body.classList.add("card-body");

        const card_title = document.createElement("div");
        card_title.classList.add("card-title", "mb-3");

        const title = document.createElement("h5");
        title.innerText = vendor.name;

        const detail_button = document.createElement("button");
        detail_button.classList.add(
            "btn",
            "btn-outline-primary",
            "btn-sm",
            "w-100"
        );
        detail_button.innerText = "Lihat Detail";

        detail_button.addEventListener("click", () => {
            vendor.vendor_images.forEach((vendor_image, index) => {
                if (!index) {
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item active">
                        <img src="${window.location.origin}/storage/${vendor_image.image}" class="d-block w-100">
                    </div>
                    `);
                } else {
                    $(
                        "#detailModal #carouselDetailModalControls .carousel-inner"
                    ).append(`
                    <div class="carousel-item">
                        <img src="${window.location.origin}/storage/${vendor_image.image}" class="d-block w-100">
                    </div>
                `);
                }
            });

            $("#detailModal .modal-title").text(vendor.name);
            $("#detailModal .description").append(vendor.description);
            $("#detailModal").modal("show");
        });

        card_image.append(image);

        card_title.append(title);
        card_body.append(card_title);
        card_body.append(detail_button);

        card.append(card_image);
        card.append(card_body);

        col_card.append(card);

        row.append(col_card);
    });

    container.append(row);
    return container;
};

const getAllTheme = async () => {
    return fetch(`${window.location.origin}/theme/getCategorizedTheme`).then(
        (response) => response.json()
    );
};

const getAllVendor = async () => {
    return fetch(`${window.location.origin}/vendor/getCategorizedVendor`).then(
        (response) => response.json()
    );
};

$(document).ready(async () => {
    const themeVendorContainer = document.getElementById(
        "theme-vendor-container"
    );

    const themes = await getAllTheme();
    themeVendorContainer.append(themeCardGenerator(themes));

    const vendors = await getAllVendor();
    vendors["vendor_type_id"].forEach((vendor_type_id) => {
        themeVendorContainer.append(
            vendorCardGenerator(vendors["vendor"][vendor_type_id])
        );
    });

    // Remove Shimer
    const theme_shimer = document.querySelectorAll(".theme-shimer");
    for (let i = 0; i < theme_shimer.length; i++) {
        theme_shimer[i].remove();
    }
    const vendor_shimer = document.querySelectorAll(".vendor-shimer");
    console.log(vendor_shimer)
    for (let i = 0; i < vendor_shimer.length; i++) {
        vendor_shimer[i].remove();
    }
});

$("#detailModal").on("hidden.bs.modal", () => {
    $("#detailModal #carouselDetailModalControls .carousel-inner").text("");
    $("#detailModal .modal-title").text("");
    $("#detailModal .description").text("");
});
