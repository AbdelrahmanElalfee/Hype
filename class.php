<?php
include "shared/authUser.php";
if (isset($_GET['class'])) {
  $classId = $_GET['class'];
  $selectClass = "SELECT * FROM`class`
  JOIN`gym`ON`class_gym`=`gym_id`
  WHERE`class_id`='$classId'";
  $runClass = mysqli_query($mysqli, $selectClass);
  $dataClass = mysqli_fetch_array($runClass);
  $className=$dataClass['class_name'];
  $classId=$dataClass['class_id'];
  $pageName = "$className";
  include "shared/header.php";
}
?>
<div class="main">
  <div class="container col-10">
    <div class="mb-3 p-3 row" style="background-color: #242424; border-radius: 15px;">
      <div class="col-6">
        <h2 class="mb-0 text-light"><?php echo$dataClass['class_name'] ?> Class</h2>
        <a href="#"><span class="mt-0 text-light"><?php echo $dataClass['gym_name'] ?> Gym</span></a>
      </div>
      <div class="text-right mt-3 col-6">
        <p style="font-size: 24px; color: #b2e000;"><?php echo$dataClass['class_price'] ?> EGP</p>
      </div>
    </div>
    <video width="1300" height="800" uk-video="autoplay: inview" controls>
      <source src="img/<?php echo$dataClass['class_src'] ?>" type="video/mp4">
      Sorry, your browser doesn't support embedded videos.
    </video>
  </div>
  <div class="container col-8 mt-3 mb-5 pt-5 pb-5" style="background-color: #242424; border-radius: 15px;">
    <div class="product_details">
      <p class="text-light"><?php echo$dataClass['class_description'] ?>.</p>
      <div class="container col-10">
        <div class="text-center">
          <p class="text-light" style="font-size: 24px;"><?php echo$dataClass['class_time'] ?></p>
          <div class="col-md-12">
            <h4 class="text-center mb-4 text-light">Class Schedule</h4>
            <div class="table-wrap uk-overflow-auto" style="background-color: #f9f9f9; border-radius: 15px;">
              <table class="uk-table text-center">
                <thead>
                <?php
      $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ];
      ?>
                  <tr>
                  <?php foreach ($days as $week) { ?>
                    <th><?php echo $week ?></th>
                  <?php } ?>
                  </tr>
                </thead>
                <tbody>
                <?php
                $selectClass = "SELECT * FROM `class` WHERE`class_id`='$classId' ORDER BY `class_days`ASC";
                $runClass = mysqli_query($mysqli, $selectClass);
                foreach ($runClass as $data) {
                ?>
                  <tr>
                    <?php for ($i = 0; $i < 7; $i++) { ?>
                      <td>
                        <?php if (str_contains($data["class_days"], "$days[$i]")) {  ?>
                          <a href="class.php?class=<?php echo $data['class_id'] ?>" class="class-name"><strong><?php echo $data['class_name'] ?></strong> <br>
                            <?php echo $data['class_time'] ?> PM</a>
                        <?php
                        } else {
                        ?>
                          <i class="fa fa-close">
                          </i>
                        <?php
                        }
                        ?>
                      </td>
                    <?php } ?>

                  </tr>
                <?php } ?>

              </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <form method="post">
            <button name="add" class="btn btn-success btn-rounded mt-2 btn-product" href="productView.php">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "shared/footer.php";
?>