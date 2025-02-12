<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Header */
        .header {
            background-color: #343a40;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        .header .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }
        .header .logo i {
            margin-right: 10px;
        }

        .header .search-bar {
            width: 250px;
            display: flex;
            align-items: center;
        }
        .header input {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 20px;
        }
        .header .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            padding-top: 20px;
            position: fixed;
            
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }

        /* Main Content */
        .content {
            margin-left: 260px;
            margin-top: 70px;
            padding: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .dark-mode {
            background-color: #121212;
            color: white;
        }
        .dark-mode .sidebar {
            background-color: rgb(165, 35, 35);
        }
        .dark-mode .sidebar a {
            color: white;
        }

        
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="logo">
        <i class="fas fa-user-graduate"></i> Student Management
    </div>
    <div class="search-bar">
        
        <input type="text" placeholder="Search..." >
    </div>
    <button class="menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
    <a href="student_regrastration.php"><i class="fas fa-user"></i> Student Registration</a>
    <a href="courses.php"><i class="fas fa-book"></i> Courses</a>
    <a href="avalible_course.php"><i class="fas fa-list"></i> Available Courses</a>
    <button id="darkModeToggle" class="btn btn-outline-secondary ms-2">
        <i class="fas fa-moon"></i> Dark Mode
    </button>
</div>

<!-- Main Content -->
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Welcome to the Student Management System</h2>
    </div>
    <p>Manage students, courses, and more with ease.</p>
</div>

<script>
    function toggleSidebar() {
        $('.sidebar').toggleClass('show');
    }
</script>

</body>
</html>
