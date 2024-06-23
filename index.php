<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asset_monitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM asset";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Asset Monitoring</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            All Asset
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="asset-category.html">Asset Category</a>
                                <a class="nav-link" href="business-area.html">Business Area</a>
                                <a class="nav-link" href="status.html">Status</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"> </li>
                    </ol>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Asset List
                        <button type="button" onClick="addAsset()">
                            Tambah data
                        </button>
                    </div>

                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>Asset Category</th>
                                    <th>Asset No.</th>
                                    <th>Asset Description</th>
                                    <th>Capt. Date</th>
                                    <th>Business Area</th>
                                    <th>Cost Center</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>Asset Category</th>
                                    <th>Asset No.</th>
                                    <th>Asset Description</th>
                                    <th>Capt. Date</th>
                                    <th>Business Area</th>
                                    <th>Cost Center</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $index = 1; // Initialize the counter
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $index . "</td>";
                                        echo "<td>" . "-" . "</td>";
                                        echo "<td>" . $row["no_asset"] . "</td>";
                                        echo "<td>" . $row["kategori_asset"] . "</td>";
                                        echo "<td>" . $row["cost_center"] . "</td>";
                                        echo "<td>" . $row["tanggal_kapitalisasi"] . "</td>";
                                        echo "<td>" . $row["area_bisnis"] . "</td>";
                                        echo "<td>" . $row["deskripsi"];
                                        echo "<td><a href='controller/delete_asset.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this asset?\")'>Delete</a></td>";
                                        echo "</tr>";

                                        $index++;
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No records found</td></tr>";
                                }
                                $conn->close();
                                ?>
                                <!-- <tr>
                                    <TD>PIC</TD>
                                    <TD>WORKSHOP EQUIPMENT</TD>
                                    <td>112000012876</td>
                                    <TD>HOSE TOOL</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015336</td>
                                    <TD>RAK KABINET AKB SDW 9M (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015337</td>
                                    <TD>RAK KABINET AKB SDW 9M (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015338</td>
                                    <TD>RAK KABINET AKB TC 800M (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015339</td>
                                    <TD>RAK KABINET AKB TC 800M (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015340</td>
                                    <TD>RACK & SHELVING AKB TC 600 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015341</td>
                                    <TD>RACK & SHELVING AKB TC 600 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015342</td>
                                    <TD>RACK & SHELVING AKB TC 600 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015343</td>
                                    <TD>RACK & SHELVING AKB TC 600 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015350</td>
                                    <TD>RAK KABINET AKB SDW 9 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015351</td>
                                    <TD>RAK KABINET AKB SDW 9 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015352</td>
                                    <TD>RAK KABINET AKB SDW 9 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>ASSET CATEGORY</TD>
                                    <td>108000015353</td>
                                    <TD>RAK KABINET AKB SDW 9 (L=710)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1030HY</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>TOOLS</TD>
                                    <td>111000029767</td>
                                    <TD>BLOW BY TEST PN 285-0900:AA</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1060HG</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>TOOLS</TD>
                                    <td>111000029930</td>
                                    <TD>COMM ADAPTER / 538-5051:AA (Enggano)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1060HG</TD>
                                </tr>
                                <tr>
                                    <TD>PHOTO</TD>
                                    <TD>TOOLS</TD>
                                    <td>112000012868</td>
                                    <TD>IMPACT ANGIN 3/4" ( Impact 3/4" Ingersoll IR 261)</TD>
                                    <TD><input type="date" /></TD>
                                    <TD>10A1060HG</TD>
                                </tr>
                                <tr>
                                    <td>Pic</td>
                                    <td>Asset Category</td>
                                    <td>Asset No.</td>
                                    <td>Asset Description</td>
                                    <td>Capt. Date</td>
                                    <td>Location</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script>
        function addAsset() {
            window.location.href = "tambah_data.html";
        }
    </script>
</body>

</html>