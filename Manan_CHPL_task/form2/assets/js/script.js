$(document).ready(function () {
    // Datepicker Initialization
    $("#dob").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "1970:2025"
    });
    // Student Photo Preview Before Upload
    $("#photo").change(function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#photo-preview").attr("src", e.target.result).css({
                    width: "150px",
                    height: "150px",
                    objectFit: "cover"
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Enrollment Status Toggle
    $("#status").change(function () {
        const isChecked = $(this).is(":checked");
        $("#status-label").text(isChecked ? "Active" : "Inactive");
    });

    // Form Validation Before Submission
    $("#enroll-form").submit(function (event) {
        let isValid = true;

        // Check if name is filled
        const name = $("#name").val().trim();
        if (name === "") {
            alert("Please enter the student's name.");
            isValid = false;
        }

        // Check if email is valid
        const email = $("#email").val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "" || !emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            isValid = false;
        }

        // Check if at least one course is selected
        if ($('input[name="courses[]"]:checked').length === 0) {
            alert("Please select at least one course.");
            isValid = false;
        }

        // If form is not valid, prevent submission
        if (!isValid) {
            event.preventDefault();
        }
    });
});
$(document).ready(function() {
    $('#category').on('change', function() {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: 'get_courses.php',  // This PHP file will handle the request
                type: 'POST',
                data: { category_id: categoryId },
                success: function(response) {
                    $('#courses-container').html(response);
                }
            });
        } else {
            $('#courses-container').html(''); // Clear courses when no category is selected
        }
    });
});
$(document).ready(function() {
    $('.container').hide().fadeIn(1500);
    
    $('.btn-primary').hover(function() {
        $(this).css('transform', 'scale(1.1)');
    }, function() {
        $(this).css('transform', 'scale(1)');
    });

    $('.form-control, .form-select, textarea').focus(function() {
        $(this).animate({ backgroundColor: "#e0f7fa" }, 300);
    }).blur(function() {
        $(this).animate({ backgroundColor: "#f9f9f9" }, 300);
    });
});

