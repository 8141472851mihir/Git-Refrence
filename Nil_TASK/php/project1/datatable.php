<?php
include("connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
</head>

<body>

    <button class="mt-3 mx-2 btn btn-outline-primary">
        <a href="./index.php">Add User</a>
    </button>
    <div class="container-fluid mt-4">
        <h2 class="text-center">Employee Details</h2>

        <table id="myTable" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Skills</th>
                    <th>Salary</th>
                    <th>Joining Date</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT e.*, d.name AS Department_name, s.name AS Designation_name 
                          FROM employee_details e 
                          JOIN departments d ON e.department_id = d.id 
                          JOIN designations s ON e.designation_id = s.id";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $statusChecked = $row['status'] == 1 ? "checked" : "";
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['Department_name']}</td>
                    <td>{$row['Designation_name']}</td>
                    <td>{$row['skills']}</td>
                    <td>{$row['salary']}</td>
                    <td>{$row['joining_date']}</td>
                    <td><button class='btn btn-primary updateBtn' data-id='{$row['id']}'>Update</button></td>
                    <td><button class='btn btn-danger deleteBtn' data-id='{$row['id']}'>Delete</button></td>
                    <td>
                        <div class='form-check form-switch'>
                            <input class='form-check-input toggleStatus' type='checkbox' data-id='{$row['id']}' $statusChecked>
                        </div>
                    </td>
                  </tr>";
                }
                ?>

                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updateForm">
                                    <input type="hidden" id="update_id" name="id">

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" id="update_name" name="name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="update_email" name="email" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" id="update_phone" name="phone" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select id="update_gender" name="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Joining Date</label>
                                        <input type="date" id="update_joining_date" name="joining_date" class="form-control" required>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                scrollX: true
            });

            $('.toggleStatus').each(function() {
                var isEnabled = $(this).prop('checked');
                var row = $(this).closest('tr');
                row.find('.updateBtn').prop('disabled', !isEnabled);
            });

            $(document).on('click', '.updateBtn', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: 'fetch_employee.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        var data = JSON.parse(response);
                        $('#update_id').val(data.id);
                        $('#update_name').val(data.name);
                        $('#update_email').val(data.email);
                        $('#update_phone').val(data.phone);
                        $('#update_gender').val(data.gender);
                        $('#update_joining_date').val(data.joining_date);

                        var modal = new bootstrap.Modal(document.getElementById('updateModal'));
                        modal.show();
                    }
                });
            });

            $('#updateForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'update_employee.php',
                    type: 'POST',
                    data: $('#updateForm').serialize(),
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });
            $(document).on('click', '.deleteBtn', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this employee?')) {
                    $.ajax({
                        url: 'delete_employee.php', 
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            alert(result.message); 
                            if (result.status === "success") {
                                location.reload(); 
                            }
                        },
                        error: function() {
                            alert('Error deleting employee. Please try again.');
                        }
                    });
                }
            });


            $(document).on('change', '.toggleStatus', function() {
                var id = $(this).data('id');
                var status = $(this).prop('checked') ? 1 : 0;
                var row = $(this).closest('tr');

                row.find('.updateBtn').prop('disabled', !status);

                $.ajax({
                    url: 'toggle_status.php',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
    </script>

</body>

</html>