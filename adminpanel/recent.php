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
    data-sidebar-image="none"></html>
    <head>
    <meta charset="utf-8" />
    <title>Authenticate Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
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
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-    title mb-0 flex-grow-1">Recent Users</h4>
                                            <div class="flex-shrink-0 d-flex align-items-center">
                                                <!-- Filter Form -->
                                                <form method="GET" action="">
                                                    <label for="statusFilter" class="me-2">Filter by Status:</label>
                                                    <select name="statusFilter" id="statusFilter"
                                                        class="form-select form-select-sm w-auto d-inline-block me-3">
                                                        <option value=""
                                                            <?= (isset($_GET['statusFilter']) && $_GET['statusFilter'] == '') ? 'selected' : ''; ?>>
                                                            All</option>
                                                        <option value="Authorized"
                                                            <?= (isset($_GET['statusFilter']) && $_GET['statusFilter'] == 'Authorized') ? 'selected' : ''; ?>>
                                                            Authorized
                                                        </option>
                                                        <option value="Unauthorized"
                                                            <?= (isset($_GET['statusFilter']) && $_GET['statusFilter'] == 'Unauthorized') ? 'selected' : ''; ?>>
                                                            Unauthorized
                                                        </option>
                                                        <<option value="India" 
                                                        <?= (isset($_GET['statusFilter']) && $_GET['statusFilter'] == 'India') ? 'selected' : ''; ?>>
                                                        India
                                                    </option>
                                                    </select>

                                                    <button type="submit" class="btn btn-primary btn-sm">Apply Filter</button>
                                                </form>

                                                <!-- PDF Generation Form -->
                                                <form method="post" action="generate_report.php" class="ms-3">
                                                    <input type="hidden" name="statusFilter"
                                                        value="<?= isset($_GET['statusFilter']) ? $_GET['statusFilter'] : '' ?>">
                                                    <button type="submit" class="btn btn-soft-info btn-sm">
                                                        <i class="ri-file-list-3-line align-middle"></i> Generate PDF Report
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive table-card">
                                                <table
                                                    class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                    <thead class="text-muted table-light">
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Mail</th>
                                                            <th scope="col">IP</th>
                                                            <th scope="col">Location</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Registration Date</th>
                                                            <th scope="col"></th>
                                                            <th scope="col">Version</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="userTableBody">
                                                        <?php
                                                        if ($jsonData === false) {
                                                            echo "<tr><td colspan='8' class='text-center'>Unable to fetch data from API.</td></tr>";
                                                        } else {
                                                            $data = json_decode($jsonData, true);
                                                            $statusFilter = isset($_GET['statusFilter']) ? $_GET['statusFilter'] : '';
                                                            $countryFilter = isset($_GET['countryFilter']) ? $_GET['countryFilter'] : '';

                                                            $filteredUsers = array_filter($data, function ($user) use ($statusFilter, $countryFilter) {
                    $statusMatch = $statusFilter === '' || (isset($user['status']) && $user['status'] === $statusFilter);
                    $countryMatch = $countryFilter === '' || (isset($user['location']['country']) && $user['location']['country'] === $countryFilter);
                    return $statusMatch && $countryMatch;
                });
                if (!empty($filteredUsers)) {
                    $serialNumber = 1;
                    foreach ($filteredUsers as $user) {
                        displayUserRow($serialNumber++, $user);
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No data available for the selected filter.</td></tr>";
                }
            }

                                                        function displayUserRow($serialNumber, $user)
                                                        {
                                                            $name = htmlspecialchars($user['name']);
                                                            $email = htmlspecialchars($user['email']);
                                                            $ip = htmlspecialchars($user['ip']);
                                                            $country = htmlspecialchars($user['location']['country'] ?? 'N/A');
                                                            $status = htmlspecialchars($user['status'] ?? 'Unknown');
                                                            $signupDate = htmlspecialchars(date('Y-m-d', strtotime($user['signupDate'])));
                                                            $statusBadge = $status === 'Authorized'
                                                                ? "<span class='badge badge-soft-success'>$status</span>"
                                                                : "<span class='badge badge-soft-danger'>$status</span>";
                                                            $v = htmlspecialchars($user['__v']);

                                                            echo "<tr class='user-row' data-status='$status'>
                                                            <td><a href='#' class='fw-medium link-primary'>$serialNumber</a></td>
                                                            <td>$name</td>
                                                            <td>$email</td>
                                                            <td>$ip</td>
                                                            <td>$country</td>
                                                            <td>$statusBadge</td>
                                                            <td>$signupDate</td>
                                                            <td>$v</td>
                                                        </tr>";
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table><!-- end table -->
                                            </div>
                                        </div>

                                    </div> <!-- .card-->
                                </div> <!-- .col-->
                            </div>

                            <!-- container-fluid -->
                        </div>
                        <!-- End Page-content -->
        </body>
    </html>
