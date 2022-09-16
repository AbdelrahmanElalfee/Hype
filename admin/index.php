<?php
include('authAdmin.php');
include "shared/sidebar.php";
$rowGym = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `gym`"));
$rowTr = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `trainner`"));
$rowDr = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `doctor`"));
$rowUser = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `user`"));

?>
<div class="main container col-12 p-5 text-center">
  <div class="uk-child-width-1-4@s uk-grid">
    <a href="gym.php" style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Gyms <span><i class='bx bx-building' style='color:#b2e000'></i></span></h3>
          <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php echo date("M d,Y") ?></time></p>
        </div>
        <p><?php echo $rowGym ?></p>
      </div>
    </a>
    <a href="trainner.php" style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Trainers <span><i class='bx bxs-user' style='color:#b2e000'></i></span></h3>
          <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php echo date("M d,Y") ?></time></p>
        </div>
        <p><?php echo $rowTr ?></p>
      </div>
    </a>
    <a href="doctor.php" style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">

        <div class="uk-card-header">
          <h3 class="uk-card-title">Nutritionists <span><i class='bx bxs-user' style='color:#b2e000'></i></span></h3>
          <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php echo date("M d,Y") ?></time></p>
        </div>
        <p><?php echo $rowDr ?></p>
      </div>
    </a>
    <a href="user.php" style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Users <span><i class='bx bxs-user' style='color:#b2e000'></i></span></h3>
          <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php echo date("M d,Y") ?></time></p>
        </div>
        <p><?php echo $rowUser ?></p>
      </div>
    </a>
    <?php
    $fetchMax = mysqli_fetch_array(mysqli_query($mysqli, "SELECT `book_gym`, COUNT(*) AS magnitude FROM book WHERE `book_gym` IS NOT NULL GROUP BY book_gym ORDER BY magnitude DESC LIMIT 1"));
    $maxGym = $fetchMax['book_gym'];
    ?>
    <a href="gym.php?showGym=<?php echo $maxGym ?>" style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Gym <span><i class='bx bx-building' style='color:#b2e000'></i></span></h3>
        </div>
        <p>
          <?php
          $fetchGym = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM`gym`WHERE`gym_id`='$maxGym'"));
          echo $fetchGym['gym_name'];
          ?></p>
      </div>
    </a>
    <?php
    $fetchMax = mysqli_fetch_array(mysqli_query($mysqli, "SELECT `book_tr`, COUNT(*) AS magnitude FROM book WHERE `book_tr` IS NOT NULL GROUP BY book_tr ORDER BY magnitude DESC LIMIT 1"));
    $maxTr = $fetchMax['book_tr'];
    ?>
    <a href="trainner.php?showDr=<?php echo$maxTr ?>"style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Trainers <span><i class='bx bxs-user' style='color:#b2e000'></i></span></h3>
        </div>
        <p>
          <?php
          $fetchTr = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM`trainner`WHERE`trainner_id`='$maxTr'"));
          echo $fetchTr['trainner_name'];
          ?></p>
      </div>
    </a>
    <?php
    $fetchMax = mysqli_fetch_array(mysqli_query($mysqli, "SELECT `book_doctor`, COUNT(*) AS magnitude FROM book WHERE `book_doctor` IS NOT NULL GROUP BY book_doctor ORDER BY magnitude DESC LIMIT 1"));
    $maxDr = $fetchMax['book_doctor'];
    ?>
    <a href="doctor.php?showDr=<?php echo$maxDr ?>"style="text-decoration:none;">
      <div class="uk-card uk-card-small uk-card-default uk-card-body mb-2">
        <div class="uk-card-header">
          <h3 class="uk-card-title">Nutritionists <span><i class='bx bxs-user' style='color:#b2e000'></i></span></h3>
        </div>
        <p>
          <?php
          $fetchDr = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM`doctor`WHERE`doctor_id`='$maxDr'"));
          echo $fetchDr['doctor_name'];
          ?></p>
      </div>
    </a>
  </div>
  <hr class="uk-divider-icon">
  <div class="row">
    <div class="col-sm-8 uk-overflow-auto">
      <table class="uk-table uk-table-divider">
        <thead>
          <tr>
            <th>Order No.</th>
            <th>User</th>
            <th>Price</th>
            <th>Time</th>
            <th>Items</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // $selectBook=;
        $runBook=mysqli_query($mysqli,"SELECT * FROM `book`
        join`user`on`book_user`=`user_id`
        ORDER BY `book_id` DESC LIMIT 3");
        foreach($runBook as $data){
        ?>
          <tr>
            <td><?php echo$data['book_id'] ?></td>
            <td><?php echo$data['user_name'] ?></td>
            <td><?php echo $data['book_total'] ?> EGP</td>
            <td><?php $time=strtotime($data['sub_time']); echo date("M-d",$time) ?></td>
            <td><a href="#" style="color: #040404;">View</a></td>
            <td style="color: orange;">Pending</td>
            <td>
              <form method="POST">
                <button class="uk-button uk-button-default">Edit</button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="col-sm-4">
      <h3>Recent Users</h3>
      <ul class="uk-list uk-list-large uk-list-striped">
      <?php 
      $selectUser="SELECT * FROM `user` ORDER BY `user_id` DESC LIMIT 3";
      $runUser=mysqli_query($mysqli,$selectUser);
      foreach($runUser as $data){
      ?>  
      <li><a href="user.php?showUser=<?php echo$data['user_id'] ?>" class="recent-user"><span><img src="../img/<?php echo$data['user_img'] ?>" alt="" width="40" height="40" class="mr-4 ml-4"></span> <?php echo$data['user_name'] ?></a></li>
      <?php } ?>    
    </ul>
    </div>
  </div>
</div>
<script src="js/app.js"></script>