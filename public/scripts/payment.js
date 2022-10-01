$.ajax({
    url: `${window.location.origin}/dashboard/getAllBank`,
    method: "GET",
    dataType: "json",
})
    .done(function (response) {
        response.forEach((bank) => {
            const option = document.createElement("option");
            option.innerText = bank.bank_name;
            $("#formPaymentModal #bank").append(option);
        });

        $("#formPaymentModal #bank").on("change", function (a, b) {
            $("#formPaymentModal #owner_name").val(
                response[this.selectedIndex - 1].owner_name
            );
            $("#formPaymentModal #pin").val(
                response[this.selectedIndex - 1].pin
            );
        });
    })
    .fail(function (e) {
        console.log(e);
        alert("error");
    });

$(".pay-btn").on("click", function () {
    $("#formPaymentModal form").attr(
        "action",
        `${window.location.origin}/dashboard/wedding/pay/${$(this).data("id")}`
    );
    $("#formPaymentModal").modal('show');
});
$("#formPaymentModal").on("hidden.bs.modal", () => {
    $("#formPaymentModal form").attr("action", "");
    document.getElementById("bank").selectedIndex = 0;
    $("#formPaymentModal #owner_name").val("");
    $("#formPaymentModal #pin").val("");
});
