<?php
include_once 'header.php';
$con = mysqli_connect("localhost", "root", "", "blood");

// Fetch all blood types
$sql = "SELECT * FROM blood";
$res1 = mysqli_query($con, $sql);
?>

<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php while ($data = mysqli_fetch_assoc($res1)) { ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="<?php echo $data['bloodname']; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $data['bloodname']; ?>-tab-pane"
                        type="button" role="tab" aria-controls="<?php echo $data['bloodname']; ?>-tab-pane" aria-selected="false">
                    <?php echo $data['bloodname']; ?>
                </button>
            </li>
        <?php } ?>
    </ul>

    <div class="tab-content" id="myTabContent">
        <?php
        // Reset result pointer to fetch blood types again
        mysqli_data_seek($res1, 0);
        while ($bloodType = mysqli_fetch_assoc($res1)) {
            $bloodName = $bloodType['bloodname'];
            
            // Count the number of donors for this blood type
            $donorsQuery = "SELECT COUNT(*) AS total_donations FROM donations WHERE blood_type = '$bloodName'";
            $countRes = mysqli_query($con, $donorsQuery);
            $countData = mysqli_fetch_assoc($countRes);
            $totalDonations = $countData['total_donations'];
            ?>
            <div class="tab-pane fade" id="<?php echo $bloodName; ?>-tab-pane" role="tabpanel" aria-labelledby="<?php echo $bloodName; ?>-tab" tabindex="0">
                <p>Total Donations: <?php echo $totalDonations; ?></p> <!-- Display total donations -->
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <?php
                        // Fetch donors for this blood type
                        $donorsRes = mysqli_query($con, "SELECT * FROM donations WHERE blood_type = '$bloodName'");
                        while ($donor = mysqli_fetch_assoc($donorsRes)) { ?>
                            <div class="d-flex align-items-center donor_box">
                                <div class="">
                                <img src="img/donate_img/<?php echo $donor['image']; ?>" alt="">
                                </div>
                                <div class="ms-3">
                                    <p class="fw-bold text-black"><?php echo $donor['donor_name']; ?></p>
                                    <a href="tel:+<?php echo $donor['contact_number']; ?>"><?php echo $donor['contact_number']; ?></a>
                                </div>
                                <div class="call ms-auto">
                                    <b><?php echo $donor['blood_type']; ?></b>
                                    <div class="">
                                        <a href="tel:+<?php echo $donor['contact_number']; ?>"><i class="fa-solid fa-phone-volume"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
include_once 'footer.php';
?>
