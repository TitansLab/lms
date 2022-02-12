<?php
session_start();
if ($_SESSION['role'] != "Abuja") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$fid = $_SESSION['fid'];
	$qur = "SELECT *,AssignmentUploadedBy FROM assignmentmaster INNER JOIN facultymaster ON assignmentmaster.AssignmentUploadedBy = facultymaster.FacultyId WHERE AssignmentUploadedBy = '$fid'";
	$res = mysqli_query($conn, $qur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("../head.php"); ?>
</head>

<body>
	<!-- NAVIGATION -->
	<?php include_once("nav.php"); ?>
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12">
					<!-- Header -->																									
					<div class="header">
						<div class="header-body">
							<div class="row align-items-center">
								<div class="col">
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										View
									</h6>
									<!-- Title -->
									<h1 class="header-title text-truncate">
										Assignment List
									</h1>
								</div>
								<div class="col-auto">
									<a href="add_assignment.php" class="btn btn-primary ml-2">
										Add Assignment
									</a>
								</div>
							</div>
							<!-- / .row -->
							<div class="row align-items-center">
								<div class="col">
									<!-- Nav -->
									<ul class="nav nav-tabs nav-overflow header-tabs">
										<li class="nav-item">
											<a href="#!" class="nav-link text-nowrap active">
												All Assignment <span class="badge rounded-pill bg-soft-secondary"><?php echo mysqli_num_rows($res); ?></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Tab content -->
					<?php
					if(mysqli_num_rows($res)>0) { ?>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
								<!-- Card -->
								<div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
									<div class="card-header">
										<div class="row align-items-center">
											<div class="col">
												<!-- Form -->
												<form>
													<div class="input-group input-group-flush input-group-merge input-group-reverse">
														<input class="form-control list-search" type="search" placeholder="Search">
														<span class="input-group-text">
															<i class="fe fe-search"></i>
														</span>
													</div>
												</form>
											</div>
											<div class="col-auto">
											</div>
										</div>
										<!-- / .row -->
									</div>
									<div class="table-responsive">
										<table class="table table-sm table-hover table-nowrap card-table">
											<thead>
												<tr>
													<th>
														<a class="list-sort text-muted" data-sort="item-name">Name</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-name">Subject</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-score">Sem</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-phone">Upload Date</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-phone">Submission Date</a>
													</th>
													<th>
														<a class="list-sort text-muted justify-content-center">Action</a>
													</th>
												</tr>
											</thead>
											<tbody class="list font-size-base">
												<?php
												while ($row = mysqli_fetch_assoc($res)) { ?>
													<tr>
														<td>
															<a class="item-name text-reset"><?php echo $row['AssignmentTitle']; ?></a>
														</td>
														<td>
															<!-- Email -->
															<span class="item-email text-reset"><?php echo $row['AssignmentSubject']; ?></span>
														</td>
														<td>
															<!-- Badge -->
															<span class=""><?php echo $row['AssignmentForSemester']; ?></span>
														</td>
														<td>
															<!-- Badge -->
															<span class=""><?php echo $row['AssignmentUploaddate']; ?></span>
														</td>
														<td>
															<!-- Badge -->
															<span class=""><?php echo $row['AssignmentSubmissionDate']; ?></span>
														</td>
														<td>
															<a href="edit_assignment.php?assid=<?php echo $row['AssignmentId']; ?>" class="btn btn-sm btn-white">
																Edit
															</a>
															&nbsp;
															<a href="assdelete.php?assid=<?php echo $row['AssignmentId']; ?>" class="btn btn-sm btn-white" onclick="if (! confirm('Are you sure to delete Assignment ?')) return false;">
																Delete
															</a>
															&nbsp;
															<a href="#" class="btn btn-sm btn-white">
																View
															</a>
														</td>
													</tr>
												<?php } ?>
												<!--over-->
										</table>
									</div>
									<div class="card-footer d-flex justify-content-between">
										<!-- Pagination (prev) -->
										<ul class="list-pagination-prev pagination pagination-tabs card-pagination">
											<li class="page-item">
												<a class="page-link pl-0 pr-4 border-right" href="#">
													<i class="fe fe-arrow-left mr-1"></i> Prev
												</a>
											</li>
										</ul>
										<!-- Pagination -->
										<ul class="list-pagination pagination pagination-tabs card-pagination">
											<li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">2</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">3</a></li>
										</ul>
										<!-- Pagination (next) -->
										<ul class="list-pagination-next pagination pagination-tabs card-pagination">
											<li class="page-item">
												<a class="page-link pl-4 pr-0 border-left" href="#">
													Next <i class="fe fe-arrow-right ml-1"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					else{ ?>
						<div class="col-12">
							<h1 class="card header-title m-5 p-5"> Oops, No Assignment To Show</h1>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	</div>

	<?php include("context.php"); ?>
	<!-- / .main-content -->
	<!-- JAVASCRIPT -->
	<!-- Map JS -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
	<!-- Delete Popup -->

</body>

</html>