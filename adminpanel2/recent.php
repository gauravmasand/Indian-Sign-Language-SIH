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
    <div class="text-end mb-3">
        <form action="generate_report.php" method="post">
            <button type="submit" class="btn btn-primary">Generate PDF Report</button>
        </form>
    </div>

    <?php
// Decode JSON data
$data = json_decode($jsonData, true);

// Set number of records per page
$recordsPerPage = 30;

// Get the current page number from the URL, default to 1
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate total pages
$totalRecords = count($data);
$totalPages = ceil($totalRecords / $recordsPerPage);

// Calculate the starting index for the current page
$startIndex = ($currentPage - 1) * $recordsPerPage;

// Slice the data for the current page
$pageData = array_slice($data, $startIndex, $recordsPerPage);

?>

<div class="table-responsive table-card">
    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
        <thead class="text-muted table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Mail</th>
                <th scope="col">IP</th>
                <th scope="col">Location</th>
                <th scope="col">Status</th>
                <th scope="col">Registration Date</th>
                <th scope="col">Version</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($pageData)) {
                echo "<tr><td colspan='8' class='text-center'>No records found.</td></tr>";
            } else {
                $serialNumber = $startIndex + 1; // Record number starts from the index of the current page
                foreach ($pageData as $user) {
                    displayUserRow($serialNumber++, $user);
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Pagination Links -->
<nav>
    <ul class="pagination justify-content-center mt-4">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $currentPage - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
            <li class="page-item <?= ($page == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $currentPage + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?php
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

        </body>
    </html>