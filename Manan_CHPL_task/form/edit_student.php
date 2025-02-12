<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="editModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="student_id">
                        <div class="mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Date of Birth:</label>
                            <input type="text" name="dob" id="dob" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label>Gender:</label><br>
                            <input type="radio" name="gender" id="gender_male" value="Male"> Male
                            <input type="radio" name="gender" id="gender_female" value="Female"> Female
                            <input type="radio" name="gender" id="gender_other" value="Other"> Other
                        </div>
                        <div class="mb-3">
                            <label>Address:</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Course:</label>
                            <select name="courses" id="courses" class="form-control" required></select>
                        </div>
                        <div class="mb-3">
                            <label>Mode of Study:</label><br>
                            <input type="radio" name="mode_of_study" value="Online"> Online
                            <input type="radio" name="mode_of_study" value="Offline"> Offline
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.edit-btn', function () {
            const id = $(this).data('id');

            // Fetch student details using AJAX
            $.ajax({
                url: 'get_student.php',
                method: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    // Populate the modal with student details
                    $("#student_id").val(data.id);
                    $("#name").val(data.name);
                    $("#email").val(data.email);
                    $("#phone").val(data.phone);
                    $("#dob").val(data.dob);
                    $("input[name='gender'][value='" + data.gender + "']").prop('checked', true);
                    $("#address").val(data.address);
                    // Populate course dropdown
                    $.ajax({
                        url: 'load_courses.php',
                        method: 'POST',
                        data: { category: data.course_category },
                        success: function (coursesData) {
                            $("#courses").html(coursesData);
                            $("#courses").val(data.courses); // Set selected course
                        }
                    });
                    // Show the modal
                    $("#editModal").show();
                }
            });
        });

        // Close the modal
        $(".close").click(function () {
            $("#editModal").hide();
        });
    </script>
</body>

</html>