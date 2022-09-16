<?php
include_once'shared/config.php';
if(!empty($_POST["govId"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM `cities` WHERE `governorate_id` = ".$_POST['govId']." "; 
    $result = $mysqli->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select City</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['cityId'].'">'.$row['city_name_en'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 

} 
?>