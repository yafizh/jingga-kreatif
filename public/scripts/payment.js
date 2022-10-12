const getAllBank = async () => {
    return fetch(`${window.location.origin}/bank/getAllBank`).then((response) =>
        response.json()
    );
};
document.addEventListener("DOMContentLoaded", async function (event) {
    const allBank = await getAllBank();
    allBank.forEach((bank) => {
        const option = document.createElement("option");
        option.innerText = bank.bank_name;
        option.value = bank.id;
        $("#formPaymentModal #bank").append(option);
    });

    $("#formPaymentModal #bank").on("change", function (a, b) {
        $("#formPaymentModal #owner_name").val(
            allBank[this.selectedIndex - 1].owner_name
        );
        $("#formPaymentModal #pin").val(allBank[this.selectedIndex - 1].pin);
    });
    $(".pay-btn").on("click", function () {
        $("#formPaymentModal form").attr(
            "action",
            `${window.location.origin}/payment/${$(this).data("id")}`
        );
        $("#formPaymentModal").modal("show");
    });
    $("#formPaymentModal").on("hidden.bs.modal", () => {
        $("#formPaymentModal form").attr("action", "");
        document.getElementById("bank").selectedIndex = 0;
        $("#formPaymentModal #owner_name").val("");
        $("#formPaymentModal #pin").val("");
    });
});
