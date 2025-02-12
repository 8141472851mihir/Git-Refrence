<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Dashboard</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: antiquewhite;
        }
        h2{
            font-size: 35px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: white;
            padding-top: 20px;
            padding-left: 10px;
            padding-right: 10px;
            transition: all 0.3s;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 20px;
            text-decoration: none;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 25px;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: rgba(154, 7, 29, 0.317);
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .overview {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .overview .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 250px;
            text-align: center;
            margin-bottom: 20px;
        }

        .overview .card:hover {
            transform: scale(1.05);
        }

        .overview .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .overview .card p {
            font-size: 1.25rem;
        }

        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        thead{
            background-color: rgba(154, 7, 29, 0.317);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: brown;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .action-buttons button {
            background-color: brown;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.3s;
            width: 200px;
        }

        .action-buttons button:hover {
            background-color: brown;
            transform: scale(1.05);
        }

        .action-buttons button:active {
            transform: scale(1);
        }

       
        @media (max-width: 1024px) {
            .overview {
                gap: 15px;
            }

            .overview .card {
                min-width: 220px;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px;
            }
        }

        @media (max-width: 768px) {
            .overview {
                flex-direction: column;
                align-items: center;
            }

            .content {
                margin-left: 0;
            }

            .sidebar {
                position: absolute;
                top: 0;
                left: -250px;
                width: 250px;
                height: 100vh;
                z-index: 1000;
                transition: all 0.3s;
            }

            .sidebar.active {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

            .sidebar-toggle {
                position: absolute;
                top: 10px;
                left: 10px;
                font-size: 2.5rem;
                color: #333;
                cursor: pointer;
            }

            #search {
                width: 90%;
            }

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 8px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .action-buttons button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.8rem;
            }

            .overview .card h3 {
                font-size: 1.2rem;
            }

            .overview .card p {
                font-size: 1rem;
            }

            .action-buttons button {
                font-size: 0.9rem;
                padding: 10px;
            }

            #search {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>

    
    <div class="sidebar" id="sidebar">
        <h2>Dashboard</h2>
        <a href="data.php">Products</a>
        <a href="category.php">Categories</a>
        <a href="subcategory.php">Subcategories</a>
    </div>

    
    <span class="sidebar-toggle" onclick="toggleSidebar()">☰</span>

   
    <div class="content">

        
        <div class="header">
            <h1>Product Inventory Dashboard</h1>
        </div>

        
        
        
        <div class="overview">
            <div class="card">
                <h3>Total Products</h3>
                <p>250</p>
            </div>
            <div class="card">
                <h3>In Stock</h3>
                <p>200</p>
            </div>
            <div class="card">
                <h3>Out of Stock</h3>
                <p>50</p>
            </div>
        </div>

       
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Stock Quantity</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product A</td>
                        <td>50</td>
                        <td>$100</td>
                        <td>Category 1</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Product B</td>
                        <td>30</td>
                        <td>$120</td>
                        <td>Category 2</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Product C</td>
                        <td>70</td>
                        <td>$80</td>
                        <td>Category 1</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        
    </script>

</body>

</html>
