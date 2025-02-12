function changestatus(country) {
    $.ajax({
        type: "POST",
        url: "data.php",
        data: { status: country },
        success: function (data) {
            $("#state").html("<option disabled selected>Select State</option>" + data);
            $("#user-data").html("<tr><td colspan='6' class='text-center'>No data available</td></tr>");
        }
    });
}

function changestates(state) {
    $.ajax({
        type: "POST",
        url: "data.php",
        data: { states: state },
        success: function (data) {
            $("#user-data").html(data);
        }
    });
}


