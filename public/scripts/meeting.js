$(".btn-detail").on("click", function () {
    $("#meetingDetailModal .modal-title").text(
        $(this).parent().parent().children("h4").text()
    );
    $("#meetingDetailModal .modal-body img").attr(
        "src",
        $(this).parent().parent().parent().children("img").attr("src")
    );
    $("#meetingDetailModal .modal-body p").text(
        $(this).parent().parent().children("p").text()
    );
    $("#meetingDetailModal").modal("show");
});

$("#meetingDetailModal").on("hidden.bs.modal", () => {
    $("#meetingDetailModal .modal-title").text("");
    $("#meetingDetailModal .modal-body img").attr("src", "");
    $("#meetingDetailModal .modal-body p").text("");
});
