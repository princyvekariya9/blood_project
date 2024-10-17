<?php
include 'db.php';
require_once 'header.php';

if (!isset($_SESSION['userid'])) {
    header("location:index.php");
}

$sql_blood = "SELECT DISTINCT bloodname FROM blood";
$result_blood = mysqli_query($con, $sql_blood);

if (!$result_blood) {
    echo "Error fetching blood types: " . mysqli_error($con);
    exit();
}

$donation_counts = [];

while ($blood_row = mysqli_fetch_assoc($result_blood)) {
    $blood_type = $blood_row['bloodname'];
    
    $sql_donation = "SELECT COUNT(*) as total_donations FROM donations WHERE blood_type = '$blood_type'";
    $result_donation = mysqli_query($con, $sql_donation);
    
    if ($result_donation) {
        $row_donation = mysqli_fetch_assoc($result_donation);
        $donation_counts[$blood_type] = $row_donation['total_donations'];
    } else {
        echo "Error fetching donation count for blood type $blood_type: " . mysqli_error($con);
        $donation_counts[$blood_type] = 0; 
    }
}

$sql_total_donations = "SELECT COUNT(*) as total_donations FROM donations";
$result_total_donations = mysqli_query($con, $sql_total_donations);

if ($result_total_donations) {
    $row_total_donations = mysqli_fetch_assoc($result_total_donations);
    $total_donations = $row_total_donations['total_donations'];
} else {
    echo "Error fetching total donation count: " . mysqli_error($con);
    $total_donations = 0; // Default to 0 in case of an error
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div> 
        </div> 
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Box for total donations -->
                <div class="col-lg-3 col-6">
                    <div class="small-box box_bg">
                        <div class="inner">
                            <h3><?php echo $total_donations; ?></h3>
                            <p>Total Donations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tint"></i>
                        </div>
                    </div>
                </div>

                <!-- Loop to display donations for each blood type -->
                <?php foreach ($donation_counts as $blood_type => $count): ?>
                    <!-- Small box for each blood type donation -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box box_bg">
                            <div class="inner">
                                <h3><?php echo $count; ?></h3>
                                <p class="font_6">Donations with Blood Type <?php echo htmlspecialchars($blood_type); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tint"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
