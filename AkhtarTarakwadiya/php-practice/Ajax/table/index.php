<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <style>
        #toastContainer{
            z-index: 1;
            position: fixed;
        }
    </style>
</head>

<body>
    <h2 class="d-flex justify-content-center mt-3">Handling Table Data Using Ajax</h2>
    <div id="toastContainer" class="toast hidden top-0 end-0  m-3">
        <div id="toastHeader" class="toast-header">
            <strong id="toastTitle" class="me-auto">Status</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body" id="toastMessage">
            Some text inside the toast body
        </div>
    </div>
    <div class="container ">

        <div id="register-form" class="card mt-3 shadow rounded-3">
            <div class="card-body">
                <h4>All Details In Table Examples</h4>
                <form id="register-form" method="post">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="Country" onchange="changestatus(this.value);">
                            <option disabled selected>Select Country</option>
                            <option value="India">India</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Canada">Canada</option>
                            <option value="UK">UK</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <!-- <label for="state" class="form-label">States</label> -->
                        <label for="state" class="">State</label>
                        <select class="form-select" aria-label="Default select example" id="state" onchange="changestates(this.value);">
                            <option value="" disabled selected>Select State</option>
                        </select>
                    </div>
                </form>
                <div class="mt-4">
                    <h4>Users List</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="user-data">
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>