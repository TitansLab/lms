<?php
session_start();
if ($_SESSION['role'] != "Abuja") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
	<!-- Map CSS -->
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />
	<!-- Libs CSS -->
	<link rel="stylesheet" href="../assets/css/libs.bundle.css" />
	<!-- Theme CSS -->
	<link rel="stylesheet" href="../assets/css/theme.bundle.css" />
	<!-- Title -->
	<title>LMS by Titanslab</title>
	<style>
	</style>
</head>

<body>
	<!-- NAVIGATION -->
	<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
		<div class="container-fluid">
			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand" href="../faculty_dashboard/">
				<img src="../assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
			</a>
			<!-- User (xs) -->
			<div class="navbar-user d-md-none">
				<!-- Dropdown -->
				<div class="dropdown">
				</div>
			</div>
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidebarCollapse">
				<!-- Form -->
				<form class="mt-4 mb-3 d-md-none">
					<div class="input-group input-group-rounded input-group-merge input-group-reverse">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-text">
							<span class="fe fe-search"></span>
						</div>
					</div>
				</form>
				<!-- Navigation -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="../faculty_dashboard" class="nav-link ">
							<i class="fe fe-home"></i> Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a href="#sidebarProfile" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
							<i class="fe fe-file"></i>Student
						</a>
						<div class="" id="sidebarProfile">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="student_list.php" class="nav-link ">
										View Student List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_student.php" class="nav-link active">
										Add New Student
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_student.php" class="nav-link">
										Edit Student Details
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link ">
							<i class="fe fe-percent"></i> Marksheet
						</a>
					</li>
					<li class="nav-item">
						<a href="update.php" class="nav-link ">
							<i class="fe fe-bell"></i>Updates
						</a>
					</li>
					<li class="nav-item">
						<a href="attendance.php" class="nav-link ">
							<i class="fe fe-clipboard"></i>Attendance
						</a>
					</li>
					<li class="nav-item d-md-none">
						<a class="nav-link" href="#" data-toggle="modal">
							<span class="fe fe-bell"></span> Notifications
						</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="navbar-divider my-3">
				<!-- Heading -->
				<h6 class="navbar-heading">
					Help Center
				</h6>
				<!-- Navigation -->
				<ul class="navbar-nav mb-md-4">
					<li class="nav-item">
						<a href="account_related.php" class="nav-link ">
							<i class="fe fe-user"></i>Account related Details
						</a>
					</li>
					<li class="nav-item">
						<a href="study_related.php" class="nav-link ">
							<i class="fe fe-book"></i>Study related querys
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-10 col-xl-8">
					<!-- Header -->
					<div class="header mt-md-5">
						<div class="header-body">
							<div class="row align-items-center">
								<div class="col">
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										Add New
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Student
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
					<!-- Form -->
					<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
						<div class="row justify-content-between align-items-center">
							<div class="col">
								<div class="row align-items-center">
									<div class="col-auto">
										<!-- Personal details -->
										<!-- Avatar -->
										<div class="avatar">
											<img class="avatar-img rounded-circle" src="../assets/img/avatars/profiles/avatar-1.jpg" alt="...">
										</div>
									</div>
									<div class="col ml-n2">
										<!-- Heading -->
										<h4 class="mb-1">
											Student Photo
										</h4>
										<!-- Text -->
										<small class="text-muted">
											PNG or JPG no bigger than 1000px wide and tall.
										</small>
									</div>
								</div>
								<!-- / .row -->
							</div>
							<div class="col-auto">
								<!-- Button -->
								<input type="file" name="stuprofile" class="btn btn-sm" accept="image/png">
							</div>
						</div>
						<!-- / .row -->
						<!-- Divider -->
						<hr class="my-5">
						<div class="row">
							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">First name</label>
								<input type="text" class="form-control" id="validationCustom01" name="fname" required>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<label for="validationCustom01" class="form-label">Middle name</label>
								<input type="text" class="form-control" id="validationCustom01" name="mname" required>
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<label for="validationCustom01" class="form-label">Last name</label>
								<input type="text" class="form-control" id="validationCustom01" name="lname" required>
							</div>
							</div>
						</div>
						<!-- / .row -->
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label for="validationCustom01" class="form-label">
										Student Email address
									</label>
									<!-- Input -->
									<input type="email" class="form-control" id="validationCustom01" name="semail" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label for="validationCustom01" class="form-label">
									Student Contact Number
								</label>
								<input type="tel" pattern="[0-9]{10}" maxlength="10" id="validationCustom01" class="form-control" name="scontact" required>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label for="validationCustom01" class="form-label">
										Student Address
									</label>
									<!-- Input -->
									<input type="text" id="validationCustom01" class="form-control" name="add" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label for="validationCustom01" class="form-label">
										Date of Birth
									</label>
									<!-- Input -->
									<input type="date" id="validationCustom01" class="form-control" name="dob" required data-flatpickr placeholder="YYYY-MM-DD">
								</div>
							</div>
						</div>
						<!-- / Personal details-->
						<hr class="my-5">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Parent's Contact Number
									</label>
									<input type="tel" id="validationCustom01" maxlength="10" class="form-control" pattern="[0-9]{10}" name="pcontact" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label for="validationCustom01" class="form-label">
									Parent's Email
								</label>
								<input type="email" id="validationCustom01" class="form-control" name="pmail" required>
							</div>
						</div>
						<hr class="my-5">
						<!-- / .row -->
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Student Enrollment No
									</label>
									<input type="tel" pattern="[0-9]{12}" id="validationCustom01" class="form-control" name="senr" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label class="form-label">
										Student Roll No
									</label>
									<input type="tel" pattern="[0-9]{3}" id="validationCustom01" class="form-control" name="sroll" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Student Branch
									</label>
									<input type="text" id="validationCustom01" class="form-control" name="sbranch" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Student Semester
									</label>
									<select class="form-control" id="validationCustom01" name="ssem" required>
										<option value="">Select Semester</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>
							</div>
						</div>
						<hr class="mt-4 mb-5">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<p class="form-label">
										Student Login ID
									</p>
								</div>
							</div>
							<div class="col-auto col-6">
								<div class="input-group">
									<input type="text" class="form-control" readonly name="slid" value="Hello World" id="myInput">
									<button class="btn btn-primary" onclick="myFunction()"><i class="fe fe-copy"></i></button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									Student Password
								</div>
							</div>
							<div class="col-auto col-6">
								<div class="input-group">
									<input type="text" class="form-control" readonly name="spassword" value="<?php echo (rand(11111, 99999)); ?>" id="myInput2">
									<button class="btn btn-primary" onclick="myFunction2()"><i class="fe fe-copy"></i></button>
								</div>
							</div>
						</div>

						<!-- Divider -->
						<hr class="mt-4 mb-5">
						<div class="d-flex justify">
							<!-- Button -->
							<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Add Student
							</button>
						</div>
						<!-- / .row -->
					</form>
					<br>
					<div class="alert alert-success" role="alert">
						Student Added Successfully
					</div>
				</div>
			</div>
			<!-- / .row -->
		</div>
	</div>
	<!-- / .main-content -->
	<!-- JAVASCRIPT -->
	<!-- Map JS -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
	<script>
		function myFunction() {
			/* Get the text field */
			var copyText = document.getElementById("myInput");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */

			/* Copy the text inside the text field */
			navigator.clipboard.writeText(copyText.value);

			/* Alert the copied text */
			alert("Copied the text: " + copyText.value);
		}

		function myFunction2() {
			/* Get the text field */
			var copyText = document.getElementById("myInput2");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */

			/* Copy the text inside the text field */
			navigator.clipboard.writeText(copyText.value);

			/* Alert the copied text */
			alert("Copied the text: " + copyText.value);
		}
	</script>
<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>

</html>

<?php
if (isset($_POST['subbed'])) {
	$f_name = $_FILES['stuprofile']['name'];
	$f_tmp_name = $_FILES['stuprofile']['tmp_name'];
	$f_size = $_FILES['stuprofile']['size'];
	$f_error = $_FILES['stuprofile']['error'];
	$f_type = $_FILES['stuprofile']['type'];
	$f_ext = explode('.', $f_name);
	$f_ext = strtolower(end($f_ext));

	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$scontact = $_POST['scontact'];
	$semail = $_POST['semail'];
	$dob = $_POST['dob'];
	$pcontact = $_POST['pcontact'];
	$pmail = $_POST['pmail'];
	$ssem = $_POST['ssem'];
	$senr = $_POST['senr'];
	$sroll = $_POST['sroll'];
	$sbranch = $_POST['sbranch'];
	$spassword = $_POST['spassword'];
	$slid = $_POST['slid'];
	$add = $_POST['add'];
	$dob = $_POST['dob'];

	$fs_name = $sroll . "." . $f_ext;

	if ($f_error === 0) {
		if ($f_size <= 1000000) {
			move_uploaded_file($f_tmp_name, "../src/uploads/stuprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
		} else {
			echo "<script>alert(File size is to big .. !);</script>";
		}
	} else {
		echo "Something went wrong .. !";
	}
	$sql = "INSERT INTO studentmaster(StudentDOB, StudentEnrollmentNo, StudentPassword, StudentFirstName, StudentMiddleName, StudentLastName, StudentProfilePic, StudentBranch, StudentSemester, StudentEmail, StudentContactNo, StudentAddress, ParentEmail, ParentContactNo, StudentRollNo) VALUES ('$dob','$senr','$spassword','$fname','$mname','$lname','$fs_name','$sbranch','$ssem','$semail','$scontact','$add','$pmail','$pcontact','$sroll');";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Student Added Successfully')</script>";
		echo "<script>window.open('add_student.php','_self')</script>";
	} else {
		echo "<script>alert('Student Not Added')</script>";
		echo "<script>window.open('add_student.php','_self')</script>";
	}
}
?>