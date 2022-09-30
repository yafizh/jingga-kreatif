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
