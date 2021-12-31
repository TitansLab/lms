<?php
	session_start();
	if ($_SESSION['role'] != "Texas") {
		header("Location: ../default.php");
	} else {
		include_once("../config.php");
		$_SESSION["userrole"] = "Faculty";
	}
	#fetching tables
	if(isset($_GET['brid']) && isset($_GET['semid'])){
	$brcode = $_GET['brid'];
	$facsel = "SELECT * FROM facultymaster WHERE FacultyBranchCode = '$brcode'";
	$facresult = mysqli_query($conn, $facsel);
	$branchsel = "SELECT * FROM branchmaster where BranchCode = '$brcode'";
	$branchresult = mysqli_query($conn, $branchsel);
	$brow = mysqli_fetch_assoc($branchresult);
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once("../head.php"); ?>
	</head>
	<body>
		<!-- NAVIGATION -->
		<?php include_once("../nav.php"); ?>
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
											Subject
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<br>
						<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
							<div class="row justify-content-between align-items-center">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-auto">
											<!-- Personal details -->
											<!-- Avatar -->
											<div class="avatar">
												<img name="simg" class="w-100 border-radius-lg shadow-sm rounded"
													src="../assets/img/avatars/profiles/avatar-1.jpg" alt="..."
													id="IMG-preview">
											</div>
										</div>
										<div class="col ml-n2">
											<!-- Heading -->
											<h4 class="mb-1">
												Subject Photo
											</h4>
											<!-- Text -->
											<small class="text-muted">
											Only allowed PNG or JPG less than 2MB
											</small>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<div class="col-auto">
									<!-- Button -->
									<input type="file" id="img" name="subprofile" class="btn btn-sm"
										onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
								</div>
							</div>
							<!-- Priview Profile pic  -->
							<script>
								function showPreview(event) {
								    var file = document.getElementById('img');
								    if (file.files.length > 0) {
								        // RUN A LOOP TO CHECK EACH SELECTED FILE.
								        for (var i = 0; i <= file.files.length - 1; i++) {
								            var fsize = file.files.item(i).size; // THE SIZE OF THE FILE.	
								        }
								        if (fsize <= 2000000) {
								            var src = URL.createObjectURL(event.target.files[0]);
								            var preview = document.getElementById("IMG-preview");
								            preview.src = src;
								            preview.style.display = "block";
								        } else {
								            alert("Only allowed less then 2MB.. !");
								            file.value = '';
								        }
								    }
								}
							</script>
							<hr class="my-5">
							<div class="row">
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Subject Code</label>
									<input type="number" class="form-control" id="validationCustom01" name="icode" placeholder="3330701" required><br>
								</div>
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Subject Name</label>
									<input type="text" class="form-control" id="validationCustom01" name="iname" placeholder="Computer Programming" required><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Branch</label>
									<input type="text" class="form-control" id="validationCustom01" name="ibranch" value="<?php echo $brow['BranchName'];?>" readonly><br>
								</div>
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Semester</label>
									<select class="form-select" aria-label="Default select example" name="isem" required>
										<option hidden value="<?php echo substr($_GET['semid'],-1,1);?>"><?php echo substr($_GET['semid'],-1,1);?></option>
										<?php for($x=1;$x<=$brow['BranchSemesters'];$x++){
											echo "<option value='".$x."'>".$x."</option>";
										}?>
									</select>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Faculty</label>
									<select class="form-select" aria-label="Default select example" name="ifac" required>
										<option value="" hidden="">Select Faculty</option>
										<?php
											while($facrow = mysqli_fetch_assoc($facresult)){ ?>
										<option value="<?php echo $facrow['FacultyId']; ?>">
											<?php echo $facrow['FacultyFirstName']." ".$facrow['FacultyLastName']; ?> 
										</option>
										<?php
											} ?>
									</select>
								</div>
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Syllabus</label>
									<input type="file" style="background-color : #F9FBFD;" class="form-control border-0" id="validationCustom01" name="isyllabus" accept="application/pdf" required><br>
								</div>
							</div>
							<!-- Divider -->
							<hr class="mt-4 mb-5">
							<div class="d-flex justify">
								<!-- Button -->
								<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Add Subject
								</button>
							</div>
							<!-- / .row -->
						</form>
						<br>
					</div>
				</div>
				<!-- / .row -->
			</div>
		</div>
		<!-- Map JS -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
		<!-- Vendor JS -->
		<script src="../assets/js/vendor.bundle.js"></script>
		<!-- Theme JS -->
		<script src="../assets/js/theme.bundle.js"></script>
	</body>
</html>
<?php
	if (isset($_POST['subbed'])) {
	
		$fs_name = $_FILES['subprofile']['tmp_name'];
		$f_size = $_FILES['subprofile']['size'];
		$f_error = $_FILES['subprofile']['error'];

		if ($f_error === 0) {
			if ($f_size <= 1000000) {
				move_uploaded_file($fs_name, "../src/uploads/subprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script>alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
	
		$icode = $_POST['icode'];
		$iname = $_POST['iname'];
		$ibanch = $_POST['ibranch'];
		$isme = $_POST['isem'];
		$ifac = $_POST['ifac'];
		$isyllabus = $_POST['isyllabus'];
		$temo = $brow['BranchId'];
		$temo2 = $brow['BranchCode']."_".$isme;
		
		$iimg = $icode.".png";
	
		$sql = "INSERT INTO subjectmaster (SubjectCode, SubjectName, SubjectBranch, SubjectSemester, SubjectFacultyId, SemCode,SubjectPic) 
									VALUES ('$icode', '$iname', '$temo', '$isme', '$ifac', '$temo2','$iimg');";
		$run = mysqli_query($conn, $sql);
		if ($run == true) {
			echo "<script>alert('Subject Added Successfully')</script>";
			echo "<script>window.open('add_subject.php','_self')</script>";
		} else {
			echo "<script>alert('Subject Not Added')</script>";
			echo "<script>window.open('add_subject.php','_self')</script>";
		}
	}
}
else{
	header("location: branch_profile.php");
}
	?>