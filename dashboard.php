<?php 
include_once 'header.php';
include_once 'private/submission_function.php';
 ?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Welcome <?=$fetch_loginer["name"];?>!</h5>
                <p class="mb-4">
                  You are a <span class="fw-bold"><?=$uRole?></span> on this platform.
                </p>
                <?php if ($uRole="Student"){
                  $getstudentRes=mysqli_query($db,"SELECT * FROM `final_result` WHERE `user_id`='$uid'");
                  if (mysqli_num_rows($getstudentRes)>0) {
                    $fetchstu_res=mysqli_fetch_assoc($getstudentRes);
                    echo ' <a href="javascript:;" class="btn btn-sm btn-outline-primary">Your Final Grade Is: '.$fetchstu_res["final_grade"].'</a>';
                  }
                }
                    ?>

                 
                
                
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                src="assets/img/illustrations/man-with-laptop-light.png"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- STUDENT AREA -->
    <?php if ($_SESSION['user_role']=="Student") {?>
      
   
    <ul class="nav nav-pills flex-column flex-md-row mb-3">

     <?php $thesissub->getsubthesis(); ?>

    </ul>
    <div class="card table-responsive">
      <h4 class="card-header">Thesis Submisson</h4>
      <div class="card-body">
        
        <table class="table table-bordered mb-3">
          <thead>
            <tr>
              <th>Title</th>
              <th>Summary</th>
              <th>Supervisor Status</th>
              <th>Examiner Status</th>
              <th>Coordinator Status</th>
              <th>Submited Date & Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $thesissub->showthesis(); ?>
          </tbody>
        </table>
        <?php 

        $anythisis=mysqli_query($db,"SELECT * FROM `thesis_list` WHERE `user_id`='$uid'");
        if (mysqli_num_rows($anythisis)>0) {
          $fetch_thesis=mysqli_fetch_assoc($anythisis);

          ?>
           <h4 class="card-title">Progress Tracker</h4>
        <div class="row">
          <div class="col-1"></div>
          <div class="col-10">
            <table class="text-center "style="
              font-size: 22px;
              text-align: center;
              ">
              <tbody>
                <tr>
                  <?php
                   if($fetch_thesis['coordinator_status']=='Approved'){
                        echo '<td class="text-primary" style="padding-right: 30px !important;"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      ';
                    }elseif($fetch_thesis['examiner_status']=='Approved'){
                       echo '<td class="text-primary" style="padding-right: 30px !important;"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      ';
                    }elseif($fetch_thesis['examiner_id']!=0){
                       echo '<td class="text-primary" style="padding-right: 30px !important;"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      ';
                    }elseif($fetch_thesis['supervisor_status']=='Approved'){
                       echo '<td class="text-primary" style="padding-right: 30px !important;"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      ';
                    }elseif ($fetch_thesis['assignment_satus']=='Submitted') {
                      echo '<td class="text-primary" style="padding-right: 30px !important;"><i class="bx bxs-check-circle" id="iconc"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      ';
                    }else{
                      echo '<td class="text-primary" style="padding-right: 30px !important;"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>
                      <td class="text-primary"><i class="bx bxs-check-circle" id="iconc2"></i></td>';
                    }

                   ?>
                  
                  
                </tr>
                <tr>
                  <td style="padding-right: 30px !important;">Submitted</td>
                  <td >Supervisor Feebback</td>
                  <td >Examiners Assigned</td>
                  <td >Examiners Feedback</td>
                  <td >Final Grade Received</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-1"></div>
        </div>
      <?php   } ?>
       
      </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <form  method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Upload Your Thesis</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="nameBasic" class="form-label">Title of the Project Thesis</label>
                  <input type="text" id="title" name="title" required class="form-control" placeholder="Enter Programme Name">
                </div>
                <div class="col-12 mb-3">
                  <label for="nameBasic" class="form-label">Summary Of Project Thesis</label>
                  <textarea name="summary" class="form-control" required cols="30" rows="5"></textarea>
                </div>
                <div class="col-12 mb-3">
                  <label for="nameBasic" class="form-label">Upload Project Thesis File</label>
                  <input type="file"  name="thesisfile" required class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
              </button>
              <button type="submit" name="addprogramme" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- STUDENT AREA -->
     <?php } ?>
  </div>
  <style>
  #iconc{
  font-size: 50px;
  color: #4F6BCF;
  }
  #iconc2{
  font-size: 50px;
  color: #ddd;
  }
  td{
/*   color: black; */
  }
  tr td {border-right: 1px solid black;padding: 5px !important;}
  </style>
  <!-- / Content -->
  <?php include_once 'footer.php'; ?>