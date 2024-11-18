<?php
// API URL to fetch users
$apiUrl = 'https://auth-web-api.onrender.com/api/users';

// Fetch user data from the API
$jsonData = @file_get_contents($apiUrl);

// Initialize totalUsers count to 0 in case of failure
$totalUsers = 0;
$totalSessionTime = 0;

if ($jsonData !== false) {
    $data = json_decode($jsonData, true);
    $totalUsers = count($data);
    foreach ($data as $user) {
        $sessionTime = isset($user['sessiontime']) ? (int)$user['sessiontime'] : 0;
        $totalSessionTime += $sessionTime;
    }

// Calculate bounce rate
$bounceRate = ($totalSessionTime/$totalSessionTime/20) *100;
}
//echo "<script>alert('$totalSessionTime');</script>";
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">
<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jul 2022 06:35:06 GMT -->

<head>
    <h1>Hello</h1>
    <meta charset="utf-8" />
    <title>Analytics | Velzon - Admin & Dashboard Template  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/hackathon_logo.jpg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                    id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                    id="search-close-options"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar style="max-height: 320px;">
                                    <!-- item-->
                                    <div class="dropdown-header">
                                        <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                    </div>

                                    <div class="dropdown-item bg-transparent text-wrap">
                                        <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">how to
                                            setup <i class="mdi mdi-magnify ms-1"></i></a>
                                        <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i
                                                class="mdi mdi-magnify ms-1"></i></a>
                                    </div>
                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Analytics Dashboard</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                        <span>Help Center</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                        <span>My account settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header mt-2">
                                        <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Angela Bernier</h6>
                                                    <span class="fs-11 mb-0 text-muted">Manager</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">David Grasso</h6>
                                                    <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- item -->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-5.jpg"
                                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="m-0">Mike Bunch</h6>
                                                    <span class="fs-11 mb-0 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results
                                        <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna
                                            Adame</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Anna!</h6>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="apps-chat.html"><i
                                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Messages</span></a>
                                <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Taskboard</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i
                                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Help</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Balance : <b>$5971.67</b></span></a>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span
                                        class="badge bg-soft-success text-success mt-1 float-end">New</span><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Lock screen</span></a>
                                <a class="dropdown-item" href="auth-logout-basic.html"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/hackathon_logo.jpg" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-key="t-analytics"> Analytics </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="recent.php" class="nav-link" data-key="t-analytics">Recent Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="chatbot.php" class="nav-link" data-key="t-analytics">Chat Assistant</a>
                                    </li>

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->



                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div classl̥="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Analytics</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Analytics</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="col-xxl-8">
    <div class="d-flex flex-column h-100">
    <div class="row">
   

<!-- Users Card -->
<div class="col-md-10">
    <div class="card card-animate" style="height: 280px; background-color: #F7F6C5;">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="fw-medium text-dark mb-0">Users</p>
                    <h2 class="mt-4 ff-secondary fw-semibold">
                        <!-- Display Total Users -->
                        <span id="totalUsers" class="counter-value"></span> <!-- Empty span for dynamic value -->
                    </h2>
                    <p class="mb-0 text-muted">
                        <span class="badge bg-light text-danger mb-0">
                            <i class="ri-arrow-down-line align-middle"></i> 3.96 %
                        </span> vs. previous month
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="avatar-lg flex-shrink-0">
                        <span class="avatar-title bg-soft-primary rounded-circle fs-3">
                            <i data-feather="user" class="text-primary"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categorize users into Active, Inactive, and Total -->
            <div class="row mt-4">
                <div class="col">
                    <p class="mb-0 text-muted"><b>Active Users</b></p>
                    <h4 class="mt-2" id="activeUsers"></h4> <!-- Empty for dynamic value -->
                </div>
                <div class="col">
                    <b><p class="mb-0 text-muted"><b>Inactive Users</b></p></b>
                    <h4 class="mt-2" id="inactiveUsers"></h4> <!-- Empty for dynamic value -->
                </div>
            </div>

            <div class="position-absolute bottom-0 start-0 mb-4 ms-4">
                <button id="exportUsersCsv" class="btn btn-primary">Export CSV</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to fetch data from the API
        function fetchUserData() {
            // Replace with your API endpoint
            fetch('https://api.example.com/getUserData') 
                .then(response => response.json())
                .then(data => {
                    // Assuming the API returns an object with totalUsers, activeUsers, and inactiveUsers
                    var totalUsers = data.totalUsers;
                    var activeUsers = data.activeUsers;
                    var inactiveUsers = data.inactiveUsers;

                    // Update the HTML with fetched values
                    document.getElementById("totalUsers").textContent = 199;
                    document.getElementById("activeUsers").textContent = activeUsers.toLocaleString();
                    document.getElementById("inactiveUsers").textContent = inactiveUsers.toLocaleString();
                })
                .catch(error => {
                    console.error('Error fetching user data:', error);
                    // Handle error appropriately (e.g., display a fallback value or message)
                    document.getElementById("totalUsers").textContent = 199;
                    document.getElementById("activeUsers").textContent = "N/A";
                    document.getElementById("inactiveUsers").textContent = "N/A";
                });
        }

        // Fetch user data on page load
        fetchUserData();
    });
    // Export CSV functionality for Users Card
    document.getElementById("exportUsersCsv").addEventListener("click", function () {
        const totalUsers = <?= json_encode($totalUsers); ?>; // Ensure PHP value is passed correctly
        const csvContent = "data:text/csv;charset=utf-8," + "Metric,Value\nTotal Users," + totalUsers;

        const link = document.createElement("a");
        link.setAttribute("href", encodeURI(csvContent));
        link.setAttribute("download", "users_data.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    // Export CSV functionality for Sign Dataset Size Card
</script>

<!-- Include ApexCharts Library -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<!-- //<div class="row"> -->
   <!-- Container for both charts side by side -->
   <div class="row">
    <!-- DAU, WAU, and MAU Chart -->
    <div class="col-md-11">
        <div class="card card-animate" style="width: 100%; height: 350px; position: relative;"> <!-- Set consistent card height, larger width, and make it relative -->
            <div class="card-body" style="height: 100%;"> <!-- Make card body fill the card -->
                <canvas id="userActivityChart" width="1000" height="300"></canvas> <!-- Adjust canvas size -->
                <button id="exportCSVButton" class="btn btn-primary" style="position: absolute; bottom: 10px; left: 10px;">Export CSV</button> <!-- Export button at bottom left -->
            </div>
        </div>
    </div>
</div>

<!-- Include necessary libraries -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function fetchData(url) {
            return fetch(url)
                .then(response => response.json())
                .catch(error => {
                    console.log('Error fetching data:', error);
                    return { success: [], failure: [] }; // Return empty arrays for success and failure if error occurs
                });
        }
        // DAU, WAU, and MAU Chart
        var customDAU = 1500;  // Custom DAU value
        var customWAU = 8000;  // Custom WAU value
        var customMAU = 22000; // Custom MAU value
        var ctx1 = document.getElementById('userActivityChart').getContext('2d');

        var userActivityChart = new Chart(ctx1, {
            type: 'bar', // Specify bar chart
            data: {
                labels: ['DAU (Daily Active Users)', 'WAU (Weekly Active Users)', 'MAU (Monthly Active Users)'], // Label for bars
                datasets: [{
                    label: 'Active Users', // Label for the bar chart
                    data: [customDAU, customWAU, customMAU], // Custom data for DAU, WAU, and MAU
                    backgroundColor: ['#00B0FF', '#A1FCDF', '#009688'], // Sky Blue for DAU, Dark Purple for WAU, Teal for MAU
                    borderColor: ['#00B0FF', '#A1FCDF', '#009688'], // Matching border color with the bars
                    borderWidth: 0,
                    barPercentage: 1, // Control bar width to prevent shrinking
                    categoryPercentage: 1 // Control space between bars
                }]
            },
            options: {
                indexAxis: 'y', // Change this to 'y' to make it horizontal
                animation: {
                    duration: 0 // Disable animation by setting the duration to 0
                },
                scales: {
                    x: {
                        beginAtZero: true, // Start the x-axis from 0
                        title: {
                            display: true,
                            text: 'Number of Users'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Metrics'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw.toLocaleString() + ' users'; // Display number of users
                            }
                        }
                    }
                }
            }
        });

        // Function to export chart data as CSV
        document.getElementById("exportCSVButton").addEventListener("click", function () {
            var data = userActivityChart.data.datasets[0].data;
            var labels = userActivityChart.data.labels;
            var csv = "Metric,Active Users\n"; // CSV header

            // Loop through the data and labels to create CSV rows
            for (var i = 0; i < labels.length; i++) {
                csv += labels[i] + "," + data[i] + "\n";
            }

            // Create a downloadable CSV file
            var hiddenElement = document.createElement('a');
            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
            hiddenElement.target = '_blank';
            hiddenElement.download = 'user_activity_data.csv'; // File name
            hiddenElement.click();
        });
    });
</script>


<div class="row">
    <!-- Daily Active Users (24 hours) -->
    <div class="col-md-6">
        <div class="card card-animate" style="width: 100%; height: 500px; position: relative;">
            <div class="card-body" style="height: 100%;">
                <canvas id="dailyChart" width="500" height="300"></canvas>
                <div class="metrics" style="padding: 10px;">
                    <p><b>Total Users:</b> <span id="dailyTotalUsers">0</span></p>
                    <p><b>Active Users:</b> <span id="dailyActiveUsers">0</span></p>
                    <p><b>Inactive Users:</b> <span id="dailyInactiveUsers">0</span></p>
                    <p><b>Total Session Time:</b> <span id="dailyTotalSessionTime">0 mins</span></p>
                    <p><b>Average Session Time:</b> <span id="dailyAvgSessionTime">0 mins</span></p>
                </div>
                <button id="exportDailyCSV" class="btn btn-primary" style="position: absolute; bottom: 10px; left: 10px;">Export CSV</button>

            </div>
        </div>
    </div>

    <!-- Weekly Active Users (7 days) -->
    <div class="col-md-6">
        <div class="card card-animate" style="width: 100%; height: 500px; position: relative;">
            <div class="card-body" style="height: 100%;">
                <canvas id="weeklyChart" width="500" height="300"></canvas>
                <div class="metrics" style="padding: 10px;">
                    <p><b>Total Users:</b> <span id="weeklyTotalUsers">0</span></p>
                    <p><b>Active Users:</b> <span id="weeklyActiveUsers">0</span></p>
                    <p><b>Inactive Users:</b> <span id="weeklyInactiveUsers">0</span></p>
                    <p><b>Total Session Time:</b> <span id="weeklyTotalSessionTime">0 mins</span></p>
                    <p><b>Average Session Time:</b> <span id="weeklyAvgSessionTime">0 mins</span></p>
                </div>
                <button id="exportWeeklyCSV" class="btn btn-primary" style="position: absolute; bottom: 10px; left: 10px;">Export CSV</button>
            </div>
        </div>
    </div>

    <!-- Monthly Active Users (4 weeks) -->
    <div class="col-md-6">
        <div class="card card-animate" style="width: 100%; height: 500px; position: relative;">
            <div class="card-body" style="height: 100%;">
                <canvas id="monthlyChart" width="500" height="300"></canvas>
                <div class="metrics" style="padding: 10px;">
                    <p><b>Total Users:</b> <span id="monthlyTotalUsers">0</span></p>
                    <p><b>Active Users:</b> <span id="monthlyActiveUsers">0</span></p>
                    <p><b>Inactive Users:</b> <span id="monthlyInactiveUsers">0</span></p>
                    <p><b>Total Session Time:</b> <span id="monthlyTotalSessionTime">0 mins</span></p>
                    <p><b>Average Session Time:</b> <span id="monthlyAvgSessionTime">0 mins</span></p>
                </div>
                <button id="exportMonthlyCSV" class="btn btn-primary" style="position: absolute; bottom: 10px; left: 10px;">Export CSV</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> <!-- Add this line for datalabels -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Simulated API call to fetch data (replace with actual API call)
        function fetchData(url) {
            return fetch(url)
                .then(response => response.json())
                .catch(error => {
                    console.log('Error fetching data:', error);
                    return { success: [], failure: [] }; // Return empty arrays for success and failure if error occurs
                });
        }

        // Fetch and render the Daily Active Users and API success/failure chart
        fetchData('https://api.example.com/daily-users')
            .then(dailyData => {
                if (dailyData.success.length === 0) {
                    dailyData = {
                        success: [120, 150, 180, 220, 170, 200, 250, 180, 160, 140, 200, 240, 300, 260, 220, 200, 190, 170, 180, 220, 210, 240, 250, 300],
                        failure: [10, 15, 20, 30, 20, 25, 30, 25, 20, 15, 25, 30, 40, 35, 30, 25, 20, 25, 30, 35, 25, 30, 35, 40] // Default data if fetch fails
                    };
                }

                var successRate = dailyData.success.map((value, index) => (value / (value + dailyData.failure[index])) * 100);
                var failureRate = dailyData.failure.map((value, index) => (value / (value + dailyData.success[index])) * 100);

                var ctxDaily = document.getElementById('dailyChart').getContext('2d');
                var dailyChart = new Chart(ctxDaily, {
                    type: 'bar',
                    data: {
                        labels: Array.from({ length: 24 }, (_, i) => `${i}:00`), // Hourly labels
                        datasets: [{
                            label: 'DAU Success Rate (%)',
                            data: successRate, // Success rate
                            backgroundColor: '#880D1E',
                            borderColor: '#880D1E',
                            borderWidth: 1,
                            datalabels: {
                                align: 'top',
                                color: 'white',
                                font: { weight: 'bold' },
                                formatter: function(value) {
                                    return value.toFixed(2) + '%'; // Show percentage with 2 decimal places
                                }
                            }
                        }, {
                            label: 'DAU Failure Rate (%)',
                            data: failureRate, // Failure rate
                            backgroundColor: '#DD2D4A',
                            borderColor: '#DD2D4A',
                            borderWidth: 1,
                            datalabels: {
                                align: 'bottom',
                                color: 'white',
                                font: { weight: 'bold' },
                                formatter: function(value) {
                                    return value.toFixed(2) + '%'; // Show percentage with 2 decimal places
                                }
                            }
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Time (Hours)' } },
                            y: { beginAtZero: true, title: { display: true, text: 'Percentage' }, max: 100 }
                        },
                        plugins: {
                            datalabels: {
                                display: true, // Enable labels to be shown
                            }
                        }
                    }
                });
            });

        // Fetch and render the Weekly Active Users and API success/failure chart
        fetchData('https://api.example.com/weekly-users')
            .then(weeklyData => {
                if (weeklyData.success.length === 0) {
                    weeklyData = {
                        success: [1500, 1600, 1400, 1700, 1800, 1900, 2000],
                        failure: [50, 60, 40, 70, 80, 90, 100] // Default data if fetch fails
                    };
                }

                var successRate = weeklyData.success.map((value, index) => (value / (value + weeklyData.failure[index])) * 100);
                var failureRate = weeklyData.failure.map((value, index) => (value / (value + weeklyData.success[index])) * 100);

                var ctxWeekly = document.getElementById('weeklyChart').getContext('2d');
                var weeklyChart = new Chart(ctxWeekly, {
                    type: 'bar',
                    data: {
                        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        datasets: [{
                            label: 'WAU Success Rate (%)',
                            data: successRate, // Success rate
                            backgroundColor: '#457B9D',
                            borderColor: '#457B9D',
                            borderWidth: 1,
                            datalabels: {
                                align: 'top',
                                color: 'white',
                                font: { weight: 'bold' },
                                formatter: function(value) {
                                    return value.toFixed(2) + '%'; // Show percentage with 2 decimal places
                                }
                            }
                        }, {
                            label: 'WAU Failure Rate (%)',
                            data: failureRate, // Failure rate
                            backgroundColor: '#1D3557',
                            borderColor: '#1D3557',
                            borderWidth: 1,
                            datalabels: {
                                align: 'bottom',
                                color: 'white',
                                font: { weight: 'bold' },
                                formatter: function(value) {
                                    return value.toFixed(2) + '%'; // Show percentage with 2 decimal places
                                }
                            }
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Day' } },
                            y: { beginAtZero: true, title: { display: true, text: 'Percentage' }, max: 100 }
                        },
                        plugins: {
                            datalabels: {
                                display: true, // Enable labels to be shown
                            }
                        }
                    }
                });
            });

        // Fetch and render the Monthly Active Users and API success/failure chart
        fetchData('https://api.example.com/monthly-users')
            .then(monthlyData => {
                if (monthlyData.success.length === 0) {
                    monthlyData = {
                        success: [22000, 23000, 25000, 28000],
                        failure: [500, 600, 400, 700] // Default data if fetch fails
                    };
                }

                var successRate = monthlyData.success.map((value, index) => (value / (value + monthlyData.failure[index])) * 100);
                var failureRate = monthlyData.failure.map((value, index) => (value / (value + monthlyData.success[index])) * 100);

                var ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
                var monthlyChart = new Chart(ctxMonthly, {
                    type: 'bar',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'MAU Success Rate (%)',
                            data: successRate, // Success rate
                            backgroundColor: '#673AB7',
                            borderColor: '#673AB7',
                            borderWidth: 1,
                            datalabels: {
                                align: 'top',
                                color: 'white',
                                font: { weight: 'bold' },
                                formatter: function(value) {
                                    return value.toFixed(2) + '%'; // Show percentage with 2 decimal places
                                }
                            }
                        }, {
                            label: 'MAU Failure Rate (%)',
                            data: failureRate, // Failure rate
                            backgroundColor: '#8D6E63',
                            borderColor: '#8D6E63',
                            borderWidth: 1,
                            datalabels: {
                                align: 'bottom',
                                color: 'white',
                                font: { weight: 'bold' },
                                formatter: function(value) {
                                    return value.toFixed(2) + '%'; // Show percentage with 2 decimal places
                                }
                            }
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Weeks' } },
                            y: { beginAtZero: true, title: { display: true, text: 'Percentage' }, max: 100 }
                        },
                        plugins: {
                            datalabels: {
                                display: true, // Enable labels to be shown
                            }
                        }
                    }
                });
            });
    });
</script>



<!-- Include necessary libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Simulated API call to fetch data (replace with actual API call)
        function fetchData(url) {
            return fetch(url)
                .then(response => response.json())
                .catch(error => {
                    console.log('Error fetching data:', error);
                    return []; // Return an empty array if there's an error fetching data
                });
        }

        // Fetch and render the Daily Active Users chart
        fetchData('https://api.example.com/daily-users')
            .then(dailyData => {
                if (dailyData.length === 0) {
                    dailyData = [120, 150, 180, 220, 170, 200, 250, 180, 160, 140, 200, 240, 300, 260, 220, 200, 190, 170, 180, 220, 210, 240, 250, 300]; // Default data if fetch fails
                }

                var ctxDaily = document.getElementById('dailyChart').getContext('2d');
                var dailyChart = new Chart(ctxDaily, {
                    type: 'line',
                    data: {
                        labels: Array.from({ length: 24 }, (_, i) => `${i}:00`), // Hourly labels
                        datasets: [{
                            label: 'DAU (24 Hours)',
                            data: dailyData, // Using fetched data
                            borderColor: '#FB5607', // New color (Red-Orange)
                            backgroundColor: '#FED9B7',
                            fill: true,
                            tension: 0.1,
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Time (Hours)' } },
                            y: { beginAtZero: true, title: { display: true, text: 'Active Users' } }
                        }
                    }
                });
            });

        // Fetch and render the Weekly Active Users chart
        fetchData('https://api.example.com/weekly-users')
            .then(weeklyData => {
                if (weeklyData.length === 0) {
                    weeklyData = [1500, 1600, 1400, 1700, 1800, 1900, 2000]; // Default data if fetch fails
                }

                var ctxWeekly = document.getElementById('weeklyChart').getContext('2d');
                var weeklyChart = new Chart(ctxWeekly, {
                    type: 'bar',
                    data: {
                        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        datasets: [{
                            label: 'WAU (7 Days)',
                            data: weeklyData, // Using fetched data
                            backgroundColor: '#457B9D', // New color (Green)
                            borderColor: '#388E3C',
                            borderWidth: 1,
                            barPercentage: 0.5,
                            categoryPercentage: 0.6
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Day' } },
                            y: { beginAtZero: true, title: { display: true, text: 'Active Users' } }
                        }
                    }
                });
            });

        // Fetch and render the Monthly Active Users chart
        fetchData('https://api.example.com/monthly-users')
            .then(monthlyData => {
                if (monthlyData.length === 0) {
                    monthlyData = [22000, 23000, 25000, 28000]; // Default data if fetch fails
                }

                var ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
                var monthlyChart = new Chart(ctxMonthly, {
                    type: 'line',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'MAU (4 Weeks)',
                            data: monthlyData, // Using fetched data
                            borderColor: '#673AB7', // New color (Purple)
                            backgroundColor: '#00B4D8',
                            fill: true,
                            tension: 0.1,
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Weeks' } },
                            y: { beginAtZero: true, title: { display: true, text: 'Active Users' } }
                        }
                    }
                });
            });

        // Export Daily Chart data as CSV
        document.getElementById("exportDailyCSV").addEventListener("click", function () {
            fetchData('https://api.example.com/daily-users').then(dailyData => {
                var csv = "Hour,Active Users\n";
                dailyData.forEach((value, index) => {
                    csv += `${index}:00,${value}\n`;
                });
                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'daily_active_users.csv';
                hiddenElement.click();
            });
        });

        // Export Weekly Chart data as CSV
        document.getElementById("exportWeeklyCSV").addEventListener("click", function () {
            fetchData('https://api.example.com/weekly-users').then(weeklyData => {
                var csv = "Day,Active Users\n";
                weeklyData.forEach((value, index) => {
                    csv += ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'][index] + ',' + value + '\n';
                });
                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'weekly_active_users.csv';
                hiddenElement.click();
            });
        });

        // Export Monthly Chart data as CSV
        document.getElementById("exportMonthlyCSV").addEventListener("click", function () {
            fetchData('https://api.example.com/monthly-users').then(monthlyData => {
                var csv = "Week,Active Users\n";
                monthlyData.forEach((value, index) => {
                    csv += `Week ${index + 1},${value}\n`;
                });
                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'monthly_active_users.csv';
                hiddenElement.click();
            });
        });
    });
</script>



<div class="row">
    <!-- Peak Traffic Time Card -->
    <div class="col-md-4">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Peak Traffic Time</p>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                        <i data-feather="clock" class="text-warning"></i>
                        </span>
                    </div>
                </div>
                <!-- Bar Chart for Peak Traffic Time -->
                <div id="peakTrafficChart" style="height: 250px;"></div>
                <button id="exportPeakTraffic" class="btn btn-primary mt-3">Export CSV</button>
            </div>
        </div>
    </div>

    <!-- Avg. Daily Time Spent Card -->
    <div class="col-md-4">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Avg. Daily Time Spent</p>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-warning rounded-circle fs-2">
                            <i data-feather="clock" class="text-warning"></i>
                        </span>
                    </div>
                </div>
                <!-- Bar Chart for Avg. Daily Time Spent -->
                <div id="avgDailyTimeChart" style="height: 250px;"></div>
                <button id="exportAvgDailyTime" class="btn btn-primary mt-3">Export CSV</button>
            </div>
        </div>
    </div>

    <!-- Avg. Session Duration Card -->
    <div class="col-md-4">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Avg. Session Duration</p>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-danger rounded-circle fs-2">
                            <i data-feather="clock" class="text-warning"></i>
                        </span>
                    </div>
                </div>
                <!-- Bar Chart for Avg. Session Duration -->
                <div id="avgSessionChart" style="height: 250px;"></div>
                <button id="exportAvgSession" class="btn btn-primary mt-3">Export CSV</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ensure PHP variables are set; default values if undefined
        var peakTrafficTime = <?= isset($peakTrafficTime) ? $peakTrafficTime : 12 ?>;
        var avgDailyTime = <?= isset($avgDailyTime) ? $avgDailyTime : 30 ?>;
        var avgSessionDuration = <?= isset($avgSessionDuration) ? $avgSessionDuration : 20 ?>;

        // Bar Chart Configuration
        var peakTrafficOptions = {
            chart: { type: 'bar', height: 250 },
            series: [{ name: 'Peak Traffic Time', data: [peakTrafficTime] }],
            xaxis: { categories: ['Metrics'] },
            yaxis: { title: { text: 'Time (minutes)' } },
            colors: ['#FF6F61'],
        };
        var avgDailyTimeOptions = {
            chart: { type: 'bar', height: 250 },
            series: [{ name: 'Avg. Daily Time Spent', data: [avgDailyTime] }],
            xaxis: { categories: ['Metrics'] },
            yaxis: { title: { text: 'Time (minutes)' } },
            colors: ['#6A5ACD'],
        };
        var avgSessionOptions = {
            chart: { type: 'bar', height: 250 },
            series: [{ name: 'Avg. Session Duration', data: [avgSessionDuration] }],
            xaxis: { categories: ['Metrics'] },
            yaxis: { title: { text: 'Time (minutes)' } },
            colors: ['#98FF98'],
        };

        // Render the charts
        var peakTrafficChart = new ApexCharts(document.querySelector("#peakTrafficChart"), peakTrafficOptions);
        peakTrafficChart.render();
        var avgDailyTimeChart = new ApexCharts(document.querySelector("#avgDailyTimeChart"), avgDailyTimeOptions);
        avgDailyTimeChart.render();
        var avgSessionChart = new ApexCharts(document.querySelector("#avgSessionChart"), avgSessionOptions);
        avgSessionChart.render();

        // Export CSV Function
        function exportCSV(chart, chartName) {
            const series = chart.w.globals.series[0];
            const labels = chart.w.globals.labels;
            let csvContent = "data:text/csv;charset=utf-8,Label,Value\n";

            // Append data to CSV
            labels.forEach((label, index) => {
                csvContent += `${label},${series[index]}\n`;
            });

            // Create a downloadable link
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", chartName + ".csv");
            document.body.appendChild(link);

            // Trigger download
            link.click();
            document.body.removeChild(link);
        }

        // Attach Export Button Events
        document.getElementById("exportPeakTraffic").addEventListener("click", function () {
            exportCSV(peakTrafficChart, "PeakTrafficTime");
        });
        document.getElementById("exportAvgDailyTime").addEventListener("click", function () {
            exportCSV(avgDailyTimeChart, "AvgDailyTimeSpent");
        });
        document.getElementById("exportAvgSession").addEventListener("click", function () {
            exportCSV(avgSessionChart, "AvgSessionDuration");
        });
    });
</script>



<div class="row">
    <!-- API Success Rate -->
    <div class="col-md-6">
        <div class="card card-animate" style="height: 350px;"> <!-- Adjust card height -->
            <div class="card-body">
                <h5 class="fw-medium text-muted mb-3">API Success Rate</h5>
                <canvas id="apiSuccessRateChart" style="width: 100%; height: 200px;"></canvas>
                <button id="exportApiSuccessRate" class="btn btn-primary mt-3">Export CSV</button>
            </div>
        </div>
    </div>

    <!-- Failed API Calls -->
    <div class="col-md-6">
        <div class="card card-animate" style="height: 350px;"> <!-- Adjust card height -->
            <div class="card-body">
                <h5 class="fw-medium text-muted mb-3">Failed API Calls</h5>
                <canvas id="failedApiCallsChart" style="width: 100%; height: 200px;"></canvas>
                <button id="exportFailedApiCalls" class="btn btn-primary mt-3">Export CSV</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // API Success Rate Data
    var successRateData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // Example months
        datasets: [{
            label: 'Success Rate (%)',
            data: [85, 88, 92, 95, 90, 93], // Example success rate values
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue fill
            borderColor: 'rgba(54, 162, 235, 1)', // Blue border
            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
            tension: 0.4 // Smooth curve
        }]
    };

    var successRateOptions = {
        responsive: false,
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Months'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Success Rate (%)'
                },
                ticks: {
                    max: 100 // Cap at 100% for success rate
                }
            }
        }
    };

    // Initialize API Success Rate Chart
    var ctx1 = document.getElementById('apiSuccessRateChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line', // Use line chart for area appearance
        data: successRateData,
        options: successRateOptions
    });

    // Failed API Calls Data
    var failedApiData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // Example months
        datasets: [{
            label: 'Failed Calls',
            data: [10, 15, 8, 5, 12, 9], // Example failure values
            fill: true,
            backgroundColor: 'rgba(255, 159, 64, 0.2)', // Light orange fill
            borderColor: 'rgba(255, 159, 64, 1)', // Orange border
            pointBackgroundColor: 'rgba(255, 159, 64, 1)',
            tension: 0.4 // Smooth curve
        }]
    };

    var failedApiOptions = {
        responsive: false,
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Months'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Calls'
                }
            }
        }
    };

    // Initialize Failed API Calls Chart
    var ctx2 = document.getElementById('failedApiCallsChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line', // Use line chart for area appearance
        data: failedApiData,
        options: failedApiOptions
    });

    // Export to CSV functionality for API Success Rate
    document.getElementById("exportApiSuccessRate").addEventListener("click", function () {
        const data = [["Month", "Success Rate (%)"]];
        successRateData.labels.forEach((label, index) => {
            data.push([label, successRateData.datasets[0].data[index]]);
        });
        
        let csvContent = "data:text/csv;charset=utf-8," + 
            data.map(row => row.join(",")).join("\n");

        const link = document.createElement("a");
        link.setAttribute("href", encodeURI(csvContent));
        link.setAttribute("download", "api_success_rate.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    // Export to CSV functionality for Failed API Calls
    document.getElementById("exportFailedApiCalls").addEventListener("click", function () {
        const data = [["Month", "Failed Calls"]];
        failedApiData.labels.forEach((label, index) => {
            data.push([label, failedApiData.datasets[0].data[index]]);
        });
        
        let csvContent = "data:text/csv;charset=utf-8," + 
            data.map(row => row.join(",")).join("\n");

        const link = document.createElement("a");
        link.setAttribute("href", encodeURI(csvContent));
        link.setAttribute("download", "failed_api_calls.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
</script>





<div class="row">
    <!-- First Card -->
    <div class="col-xl-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Live Users By Country</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        Export Report
                    </button>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div id="users-by-country" data-colors='["--vz-light"]' class="text-center" style="height: 252px"></div>
                <div class="table-responsive table-card mt-3">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-1">
                        <thead class="text-muted border-dashed border border-start-0 border-end-0 bg-soft-light">
                            <tr>
                                <th>Duration (Secs)</th>
                                <th style="width: 30%;">Sessions</th>
                                <th style="width: 30%;">Views</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">
                            <tr>
                                <td>0-30</td>
                                <td>2,250</td>
                                <td>4,250</td>
                            </tr>
                            <tr>
                                <td>31-60</td>
                                <td>1,501</td>
                                <td>2,050</td>
                            </tr>
                            <tr>
                                <td>61-120</td>
                                <td>750</td>
                                <td>1,600</td>
                            </tr>
                            <tr>
                                <td>121-240</td>
                                <td>540</td>
                                <td>1,040</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <!-- Second Card -->
    <div class="col-xl-6">
    <div class="card card-height-100">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Users From States</h4>
            <div>
                <button type="button" class="btn btn-soft-secondary btn-sm">ALL</button>
                <button type="button" class="btn btn-soft-primary btn-sm">1M</button>
                <button type="button" class="btn btn-soft-secondary btn-sm">6M</button>
            </div>
        </div>
        <div class="card-body p-0">
            <div>
                <div id="countries_charts" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div><!-- end col -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
    chart: {
        type: 'bar', // Bar chart
        height: 350
    },
    series: [{
        name: 'Sessions',
        data: [3000, 4000, 2500, 3500, 2900, 3300] // Example session data
    }],
    xaxis: {
        categories: ['Maharashtra', 'Andhra Pradesh', 'Kerala', 'Goa', 'Jammu and Kashmir', 'Bihar'], // State names
        title: {
            text: 'States',
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
            }
        }
    },
    yaxis: {
        title: {
            text: 'Sessions',
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
            }
        }
    },
    colors: ['#00A878'], // Magenta color for all bars
    grid: {
        borderColor: '#f1f1f1' // Light grid lines
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val + " sessions";
            }
        }
    },
    plotOptions: {
        bar: {
            borderRadius: 4, // Rounded corners
            horizontal: false, // Vertical bars
        }
    },
};

var chart = new ApexCharts(document.querySelector("#countries_charts"), options);
chart.render();
</script>


    <!-- Third Card -->
    <div class="col-xl-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Users by Device</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Current Year</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div id="user_device_pie_charts" data-colors='["--vz-warning", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                <div class="table-responsive mt-3">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                        <tbody class="border-0">
                        <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Web Users</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>76.02k</p>
                                </td>
                                <td class="text-end">
                                    <p class="text-danger fw-medium fs-12 mb-0"><i class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Mobile Users</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>105.02k</p>
                                </td>
                                <td class="text-end">
                                    <p class="text-danger fw-medium fs-12 mb-0"><i class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%</p>
                                </td>
                           
                        </tbody>
                    </table>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

                   

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
                data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
                <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-4">
                        <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                        <p class="text-muted">Choose your layout</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Vertical</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                        <span class="d-flex h-100 flex-column gap-1">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                                <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                            </span>
                                            <span class="bg-light d-block p-1"></span>
                                            <span class="bg-light d-block p-1 mt-auto"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
                                        class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Two Column</h5>
                            </div>
                            <!-- end col -->
                        </div>

                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                        <p class="text-muted">Choose Light or Dark Scheme.</p>

                        <div class="colorscheme-cardradio">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="layout-mode-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check card-radio dark">
                                        <input class="form-check-input" type="radio" name="data-layout-mode"
                                            id="layout-mode-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100 bg-dark"
                                            for="layout-mode-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-soft-light d-block p-1"></span>
                                                        <span class="bg-soft-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                            <p class="text-muted">Choose Fluid or Boxed layout.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width"
                                            id="layout-width-fluid" value="fluid">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Fluid</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width"
                                            id="layout-width-boxed" value="boxed">
                                        <label class="form-check-label p-0 avatar-md w-100 px-2"
                                            for="layout-width-boxed">
                                            <span class="d-flex gap-1 h-100 border-start border-end">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                            <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                            <div class="btn-group radio" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-fixed" value="fixed">
                                <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-light w-sm ms-0"
                                    for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                        <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-primary d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                            <p class="text-muted">Choose a size of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-default" value="lg">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-compact" value="md">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-small" value="sm">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size"
                                            id="sidebar-size-small-hover" value="sm-hover">
                                        <label class="form-check-label p-0 avatar-md w-100"
                                            for="sidebar-size-small-hover">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-view">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                            <p class="text-muted">Choose Default or Detached Sidebar view.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style"
                                            id="sidebar-view-default" value="default">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style"
                                            id="sidebar-view-detached" value="detached">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                    <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                                </span>
                                                <span class="d-flex gap-1 h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Detached</h5>
                                </div>
                            </div>
                        </div>
                        <div id="sidebar-color">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                            <p class="text-muted">Choose a color of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                        data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span
                                                        class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                        data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                        <span
                                                            class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient"
                                        aria-expanded="false" aria-controls="collapseBgGradient">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </button>
                                    <h5 class="fs-13 text-center mt-2">Gradient</h5>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="collapse" id="collapseBgGradient">
                                <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient" value="gradient">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient-2" value="gradient-2">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient-2">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient-3" value="gradient-3">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient-3">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                            id="sidebar-color-gradient-4" value="gradient-4">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle"
                                            for="sidebar-color-gradient-4">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-img">
                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images</h6>
                            <p class="text-muted">Choose a image of Sidebar.</p>

                            <div class="d-flex gap-2 flex-wrap img-switch">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-none" value="none">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                        <span
                                            class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                            <i class="ri-close-fill fs-20"></i>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-01" value="img-1">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                        <img src="assets/images/sidebar/img-1.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-02" value="img-2">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                        <img src="assets/images/sidebar/img-2.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-03" value="img-3">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                        <img src="assets/images/sidebar/img-3.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image"
                                        id="sidebarimg-04" value="img-4">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                        <img src="assets/images/sidebar/img-4.jpg" alt=""
                                            class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy
                            Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            // Fetch and process the user and session data from the JSON file
            fetch('https://auth-web-api.onrender.com/api/users') // Replace with the correct path to your JSON file
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    const indiaData = data.filter(user => user.location && user.location.country === 'India');
                    const countries = indiaData.map(user => user.location.country);
                    // Initialize objects to hold user and session counts by country
                    var countryUserCounts = {};
                    var sessionCountsByCountry = {};

                    // Loop through the data to aggregate both user and session counts by country
                    data.forEach(user => {
                var country = user.location.country;

                // Filter for India only
                if (country === "India") {
                    // Aggregate live user counts by India
                    if (countryUserCounts[country]) {
                        countryUserCounts[country]++;
                    } else {
                        countryUserCounts[country] = 1;
                    }

                    // Aggregate session counts by India (assuming each user represents a session)
                    if (sessionCountsByCountry[country]) {
                        sessionCountsByCountry[country]++;
                    } else {
                        sessionCountsByCountry[country] = 1;
                    }
                }
            });

                    // --- Live Users by Country Section (jsVectorMap) ---
                    var map = new jsVectorMap({
                        map: 'IN', //for india
                        selector: '#users-by-country', // Target the map container
                        regionStyle: {
                            initial: {
                                fill: '#e9ecef' // Initial color for regions
                            }
                        },
                        backgroundColor: '#ffffff', // White background
                        series: {
                            regions: [{
                                values: countryUserCounts, // Live user counts by country
                                scale: ['#C8EEFF', '#0071A4'], // Gradient colors based on value
                                normalizeFunction: 'polynomial' // Normalize the color range
                            }]
                        },
                        onRegionTipShow: function(e, label, code) {
                            if (countryUserCounts[code]) {
                                label.html(label.html() + ': ' + countryUserCounts[code] + ' users');
                            }
                        }
                    });

                    // --- Sessions by Countries Section (ApexCharts) ---
                    var countries = Object.keys(sessionCountsByCountry); // Get the country names
                    var sessionCounts = Object.values(sessionCountsByCountry);
                    // Initialize ApexChart for Sessions by Country
                    var sessionChartOptions = {
                        chart: {
                            type: 'bar',
                            height: 350,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        series: [{
                            name: 'Sessions',
                            data: sessionCounts // Session counts by country
                        }],
                        xaxis: {
                            categories: ['India'], // Country names
                            labels: {
                                style: {
                                    colors: [],
                                    fontSize: '12px'
                                }
                            }
                        },
                        colors: ['#0071A4'], // Colour for bars
                        fill: {
                            opacity: 1
                        }
                    };

                    var sessionChart = new ApexCharts(document.querySelector("#countries_charts"), sessionChartOptions);
                    sessionChart.render();
                })
                .catch(error => console.error('Error fetching data:', error));

            
        </script>


        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!-- Dashboard init -->
        <script src="assets/js/pages/dashboard-analytics.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
                <!-- DAU and MAU -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jul 2022 06:35:07 GMT -->

</html>