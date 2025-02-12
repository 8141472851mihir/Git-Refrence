$(document).ready(function () {

    // Toggle For Theme...
    $("#theme-toggle").click(function () {
        let htmlTag = $("html");
        let currentTheme = htmlTag.attr("data-bs-theme");

        if (currentTheme === "light") {
            htmlTag.attr("data-bs-theme", "dark");
        } else {
            htmlTag.attr("data-bs-theme", "light");
        }
    });

    // JS For Fetch Designation...
    $('#dep').on('change', function () {
        var department_id = $(this).val();

        $.ajax({
            url: "fetch_designations.php",
            type: "POST",
            data: { department_id: department_id },
            success: function (data) {
                $('#des').html(data);
            }
        });
    });

    // JS For Form Field Validation...
    $("#employeeForm").on("submit", function (event) {
        let isValid = true;
        $(".error-message").text("");

        $("input").each(function () {
            if ($(this).val().trim() === "") {
                $(this).closest(".form-floating").find(".error-message").text("This field is required.");
                isValid = false;
            }
        });

        if (!isValid) {
            event.preventDefault();
        }
    });

    // JS For Showing Message When Employee Registered Successfully...
    $("#employeeForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: "AddEmployee.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                var parts = response.split("|");
                var status = parts[0];
                var message = parts[1];

                if (status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        html: `${message} <br> <a href='AllEmployees.php' class='text-primary fw-bold'>See All Employees Details</a>`,
                        showConfirmButton: true
                    });
                    $("#employeeForm")[0].reset();

                } else if (status === "warning") {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning",
                        text: message,
                        showConfirmButton: true
                    });
                    $("#employeeForm")[0].reset();

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: message,
                        showConfirmButton: true
                    });
                    $("#employeeForm")[0].reset();
                }
            }
        });
    });

    $('#employeeTable').DataTable();

    // JS For Count Card Bounce Animation...
    $(".card-box").each(function (index) {
        $(this).delay(200 * index).animate({
            opacity: 1,
            transform: "translateY(0)"
        }, 500, function () {
            $(this).css("animation", "bounce 1s infinite alternate");
        });
    });

    // JS For Employee's Account Status...
    $(".status-toggle").change(function () {
        var empId = $(this).data("id");
        var newStatus = $(this).prop("checked"); // true = Active, false = Deactivated
        var statusText = $("#status-label-" + empId);

        $.ajax({
            url: "update_status.php",
            type: "POST",
            data: {
                id: empId,
                status: newStatus
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    statusText.text(response.new_status);
                    var message = (response.new_status === "Active") ? "Account Activated Successfully" : "Account Deactivated Successfully";
                    var bgColor = (response.new_status === "Active") ? "success" : "error";

                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right"
                    };
                    toastr[bgColor](message);
                } else {
                    alert("Failed to update status. Try again.");
                }
            },
            error: function () {
                alert("An error occurred. Please try again.");
            }
        });
    });

})

// Js For Data Table...
new DataTable('#example', {
    scrollX: true
});

// JS For Employee Details Update Messaage...
document.addEventListener("DOMContentLoaded", function () {
    var toastElement = document.getElementById("toastMsg");
    if (toastElement) {
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
});

// Toast Message For Deleted Employee...
setTimeout(() => {
    document.getElementById("toastMessage").classList.remove("show");
}, 3000); 