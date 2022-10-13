const isEmail = (email) => {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
};

const rupiahFormat = (number) => {
    const formatter = new Intl.NumberFormat("id-ID", {
        style: "decimal",
        currency: "IDR",
    });

    return formatter.format(number);
};

const inputNumberToBeRupiah = (input) => {
    var number_string = input.value.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    input.value = rupiah;
};

const displayInputNameFile = (input) => {
    if (input.files.length > 1) {
        let file_names = "";
        for (let i = 0; i < input.files.length; i++) {
            file_names += input.files[i].name;
            if (i !== input.files.length - 1) file_names += ", ";
        }
        input.nextElementSibling.innerText = file_names;
    } else input.nextElementSibling.innerText = input.files[0].name;
};
