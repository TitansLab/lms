<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Abuja") {
   header("Location: ../default.php");
} else {
   include_once "../config.php";
   $_SESSION["userrole"] = "Institute";
   $id = $_SESSION["userid"];
   $uqur = "SELECT * FROM querymaster WHERE QueryId = '$id'";
   $ures = mysqli_query($conn, $uqur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once "../head.php"; ?>
</head>

<body>
   <!-- NAVIGATION -->
   <?php include_once "nav.php"; ?>
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
                              Query List
                           </h1>
                        </div>
                     </div>
                     <!-- / .row -->
                  </div>
               </div>
               <!-- MAIN CONTENT -->
               <div class="main-content">
                  <div class="container-fluid">
                     <div class="row justify-content-center">
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
                                                <a class="list-sort text-muted" data-sort="item-score">Date</a>
                                             </th>
                                             <th>
                                                <a class="list-sort text-muted" data-sort="item-score">QueryQuestion</a>
                                             </th>
                                             <th>
                                                <a class="list-sort text-muted" data-sort="item-name">QuerySubject</a>
                                             </th>
                                             <th>
                                                <a class="list-sort text-muted" data-sort="item-company">Querystatus</a>
                                             </th>
                                             <th>
                                                <a class="text-muted justify-content-center">Action</a>
                                             </th>
                                             <th>
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody class="list font-size-base">
                                          <?php
                                          while ($urow = mysqli_fetch_assoc($ures)) { ?>
                                             <tr>
                                             <td>
                                                   <span class="item-score"><?php echo $urow['QueryGenDate']; ?></span>
                                                </td>
                                                <td>
                                                   <span class="item-score"><?php echo $urow['QueryQuestion']; ?></span>
                                                </td>
                                                <td>
                                                   <!-- Text -->
                                                   <span class="item-name"><?php echo $urow['QuerySubject']; ?></span>
                                                </td>
                                                <td>
																	<?php 
																		$a=$urow['Querystatus'];
																		if($a == 1)
																		{?>
																			<span class="badge bg-soft-primary">New</span>
																		<?php
																		}
																		if($a == 2)
																		{?>
																			<span class="badge bg-soft-warning">Open</span>
																		<?php
																		}
																		if($a == 3)
																		{?>
																			<span class="badge bg-soft-success">Solved</span>
																		<?php
																		}
																		?>
																</td>
                                                <td>
                                                   <a download="<?php echo $urow['QueryDocument']; ?>" href="../src/uploads/querydocument<?php echo $urow['QueryDocument']; ?>" type="button" class="btn btn-sm btn-white">Download</a>
                                                </td>
                                             </tr>
                                             </tr>

                                          <?php } ?>
                                          <!--over-->
                                       </tbody>
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
            <script>
               var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
               var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                  return new bootstrap.Tooltip(tooltipTriggerEl)
               })
            </script>
</body>

</html>