<!DOCTYPE html>
<html lang="en">
<head>
<title>Corporate | ML-Ops</title>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<meta name="description" content="Assignment2">
<meta name="keywords" content="Assignment2">
<meta name="author" content="Nguyen Dinh Dung, Pham Quang Thai, Nguyen Ngoc Thanh Thanh">
<meta name="charset" content="Corporate">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="container">
<?php
    // Database connection
    require_once('setting.php');

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch front-end developer job data
    // Fetch job data for the third Frontend Developer job by ID
$job_id = 2; // Set to 1 to retrieve the third job
$sql = "SELECT location, salary, min_requirement, pref_qualification, about_role FROM ml_operations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();
    // Fetch the job details
    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        echo "<p>No job data found for this ID.</p>";
        exit;
    }

    $conn->close();
?>

<header class="sixteen columns alpha omega">
    <a href="index.php"><img class="brand" src="img/logo.png" alt="logo"></a>
    <nav class="main-nav sixteen columns">
        <ul class="ten columns alpha">
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="apply.php">Apply</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="phpenhancements.php">Login</a></li>
        </ul>
        <div class="social six columns omega">
            <a href="https://www.facebook.com/">facebook</a>
            <a href="https://x.com/home">X</a>
        </div>
    </nav>
</header>

<div class="PageInformation">
    <section class="WebsiteInfomations">
        <div class="PosterInformation">
            <div class="PosterAvatar">
                <img src="img/logo.png" width="40" alt="Avatar">
            </div>
            <div class="PosterNameDate">
                <h2 id="PosterName">By Corporate</h2>
                <p id="PostDate">May 16, 2024</p>
            </div>
        </div>

        <br>

        <div class="details">
            <h2>Machine Learning Operations</h2>
            <div class="job-overview">
                <div class="job-details" id="JobLocation">
                    <img src="img/location-icon.svg" class="job-icon" alt="location-icon">
                    <p><?php echo htmlspecialchars($job['location']); ?></p>
                </div>
                <div class="job-details" id="JobSalary">
                    <img src="img/salary-icon.svg" class="job-icon" alt="salary-icon">
                    <p>$<?php echo htmlspecialchars(number_format($job['salary'], 2)); ?>/hr</p>
                </div>
            </div>
        </div>

        <br><br><br>

        <div class="JobMinimumQualification">
            <h2>Minimum Requirement</h2>
            <ul class="GeneralInfoList">
                <?php 
                    // Display each requirement as a list item
                    $requirements = explode('.', $job['min_requirement']);
                    foreach ($requirements as $requirement) {
                        if (trim($requirement)) {
                            echo "<li>" . htmlspecialchars(trim($requirement)) . ".</li>";
                        }
                    }
                ?>
            </ul>
        </div>

        <br><br><br>

        <div class="JobPreferredQualification">
            <h2>Preferred Qualification</h2>
            <ul class="GeneralInfoList">
                <?php 
                    // Display each preferred qualification as a list item
                    $qualifications = explode('.', $job['pref_qualification']);
                    foreach ($qualifications as $qualification) {
                        if (trim($qualification)) {
                            echo "<li>" . htmlspecialchars(trim($qualification)) . ".</li>";
                        }
                    }
                ?>
            </ul>
        </div>

        <br><br><br>

        <div class="JobAbout">
            <h2>About the Role</h2>
            <p><?php echo htmlspecialchars($job['about_role']); ?></p>
        </div>
    </section>

            <section class="GoogleMapWindow">
                <h2>Map</h2>
                <br>
                <br>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16257432.163264733!2d-85.04694141253265!3d5.841577385670684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e15a43aae1594a3%3A0x9a0d9a04eff2a340!2sColombia!5e0!3m2!1svi!2s!4v1729241181871!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <button class="button" onclick="window.location.href='apply.php';">Apply</button>
            </section>
        </div>
    
    <br>
    <br>
    <footer class="row">
        <div class="eight columns omega">
          <p>&copy;2024 <a href="#">Corporate</a> | HD aimers</p>
        </div>
        <nav class="eight columns alpha">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="apply.php">Apply</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="phpenhancements.php">Login</a></li>
          </ul>
        </nav>
      </footer>
</body>




</html>