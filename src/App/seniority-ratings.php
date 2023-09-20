<?php
include_once '../../Helpers/EmployeeManager.php';
include_once '../../Config/DBManager.php';

use TANGENT\Helpers\EmployeeManager;

$ratings = EmployeeManager::getSeniorityRatings();
$options = array();

if($ratings > 0)
{?>

   <select name="seniority_rating_id[]" class="form-control">
       <?php
            foreach($ratings as $rating)
            {?>
                 <option value="<?php echo $rating["id"];?>">
                    <?php echo $rating["name"]; ?>
                </option>
            <?php
            }
            ?>
   </select>
    <?php
}