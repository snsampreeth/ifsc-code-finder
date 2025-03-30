<?php
session_start();
include('admin/includes/dbconnection.php');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>IFSC Code Finder Portal | Home</title>
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript">
        function copyText(){
            document.getElementById("txt_copy").select();
            document.execCommand('copy');
        }
    </script>
</head>
<body>
<header class="header-area">
    <div class="navbar-area headroom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <h3 style="color: red;padding-right: 50px;">IFSC Code Finder Portal</h3>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav m-auto">
                                <li class="nav-item" style="color:red">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="admin/login.php">Admin</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<section data-scroll-index="0" id="search" class="search-area pt-115">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-8 col-sm-9">
                <div class="section-title text-center pb-20 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
                    <form method="POST" action="">
                        <input type="text" name="searchifsccode" placeholder="Enter ZipCode, Branch Name, or Branch" required>
                        <button type="submit" name="search">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-8 col-sm-9">
                <?php
                if(isset($_POST['search'])) { 
                    $sdata = $_POST['searchifsccode'];
                    echo "<h4 align='center' class='title'>Result of \"$sdata\" Bank Detail</h4>";
                ?>
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Bank Name</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Branch</th>
                            <th>IFSC Code</th>
                            <th>MICR Code</th>
                            <th>Address</th>
                            <th>Zip Code</th>
                            <th>Contact Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT tblbank.BankName as bn, tblstate.State, tblcity.City, tblbankdetail.IFSCCode, tblbankdetail.MICRCode, tblbankdetail.Address, tblbankdetail.Branch, tblbankdetail.PhoneNumber, tblbankdetail.BranchCode, tblbankdetail.ZipCode 
                                FROM tblbankdetail 
                                INNER JOIN tblstate ON tblbankdetail.StateID = tblstate.ID 
                                JOIN tblcity ON tblbankdetail.CityID = tblcity.ID 
                                JOIN tblbank ON tblbankdetail.BankName = tblbank.BankName 
                                WHERE tblbankdetail.ZipCode LIKE '%$sdata%' OR tblbankdetail.Branch LIKE '%$sdata%' OR tblbank.BankName LIKE '%$sdata%'";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if($query->rowCount() > 0) {
                            foreach($results as $row) {
                        ?>
                        <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($row->bn);?></td>
                            <td><?php echo htmlentities($row->State);?></td>
                            <td><?php echo htmlentities($row->City);?></td>
                            <td><?php echo htmlentities($row->Branch);?></td>
                            <td style='color:blue;'><?php echo htmlentities($row->IFSCCode);?></td>
                            <td><?php echo htmlentities($row->MICRCode);?></td>
                            <td><?php echo htmlentities($row->Address);?></td>
                            <td><?php echo htmlentities($row->ZipCode);?></td>
                            <td><?php echo htmlentities($row->PhoneNumber);?></td>
                        </tr>
                        <?php
                                $cnt++;
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="10" style='color:red; text-align:center'> No record found against this search</td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<footer id="footer" class="footer-area bg_cover" style="background-image: url(assets/images/footer-bg.jpg)">
    <div class="container">
        <div class="footer-copyright text-center">
            <p class="text">© <?php echo date('Y');?> IFSC Code Finder Portal</p>
        </div>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/circles.min.js"></script>
<script src="assets/js/jquery.appear.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jquery.nav.js"></script>
<script src="assets/js/scrollIt.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
