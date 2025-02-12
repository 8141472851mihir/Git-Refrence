function statuschange(status){
    var manage = status;
    $.ajax({
        type: "POST",
        url: "statuschange.php",
        data: {
            action: manage
        },
        success: function(data){
            console.log(data);
            if(data == manage){
                alert("Selected Country : " + manage);
                // console.log(manage);
        }else{
            alert("Failed to change status");
        }
    }
    })
}

$(document).ready(function () {

    $('#info-card').hover(function () {
        $(this).find(".card")
            .animate({ top: '-15px' }, 500).animate({ top: '0px' }, 500);
    }, function () {
        $(this).find(".card").stop(true).animate({ top: '0px' }, 200);
    });
    $("#info-card").hide();
    $("#myModal").hide();

    $("#reg-btn").click(function (e) {
        e.preventDefault();

        let name = $("#name").val();
        let gender = $("#gender").val();
        let age = $("#age").val();
        let mobile = $("#mobile").val();
        let countryCode = $("#country_code").val();
        // let country = $("#country").val();
        // let state = $("#state").val();
        $("#name").val(null);
        $("#gender").val(null);
        $("#age").val(null);
        $("#mobile").val(null);
        $("#country_code").val(null);
        $("#bio").val(null);
        // $("#country").val(null);
        // $("#state").val(null);

        $("#user-name").text(name);
        $("#user-gender").text(gender == 1 ? "Male" : gender == 2 ? "Female" : "Other");
        $("#user-age").text(age);
        $("#user-mobile").text(mobile);
        $("#user-country").text(countryCode);
        $("#user-state").text(state);
        $("#user-countries").text(country);
        $("#bio-info p").text(bio);

        $("#info-card").fadeIn();
    });

    $("#btn-info").click(function (e) {
        e.preventDefault();
        $("#bio-info").slideToggle();
    });

    $("#btn-edit").click(function (e) {
        e.preventDefault();

        $("#edit-user-name").val($("#user-name").text());
        $("#edit-user-gender").val($("#user-gender").text() === "Male" ? 1 : $("#user-gender").text() === "Female" ? 2 : 4);
        $("#edit-user-age").val($("#user-age").text());
        $("#edit-user-mobile").val($("#user-mobile").text());
        $("#edit-user-country_code").val($("#user-country").text());
        // $("#edit-user-country").val($("#user-countries").text() === "India" ? 1 : $("#user-countries").text() === "USA" ? 2 : $("#user-countries").text()  === "UAE" ? 3 : null);
        // $("#edit-user-state").val($("#user-state").text());
        // $("#edit-bio").val($("#bio-info p").text());
    });

    $("#overlay").click(function () {
        $("#myModal").fadeOut();
    });

    $("#edit-form").submit(function (e) {
        e.preventDefault();

        $("#user-name").text($("#edit-user-name").val());
        $("#user-gender").text($("#edit-user-gender").val() == 1 ? "Male" : $("#edit-user-gender").val() == 2 ? "Female" : "Other");
        $("#user-age").text($("#edit-user-age").val());
        $("#user-mobile").text($("#edit-user-mobile").val());
        $("#user-country").text($("#edit-user-country_code").val());
        // $("#user-state").text($("#edit-user-state").val());
        // $("#user-countries").text($("#edit-user-country").val() == "India" ? "India" : $("#edit-user-country").val());
        // $("#bio-info p").text($("#edit-bio").val());

    });

    $("#btn-delete").click(function (e) {
        e.preventDefault();
        $("#info-card").remove();
        location.reload();
    });

    $("#togle").click(function () {
        $("body").toggleClass("check");
        $("this").css({ "background-color": "white", "color": "black" });
    });
});

