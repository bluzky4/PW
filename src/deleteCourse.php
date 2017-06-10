<?php

@session_start();

require_once(dirname(__FILE__) . "/../db_model/User.php");

$allCourses = getAllCourses();

?>

<html>

<head>
    <title> Delete course</title>
</head>

<body style="margin: 10px; padding: 10px;">

<div style="position:relative; width:100%;">
    <div style="position:relative; margin:auto; width:30%;">
        <form id="profile" method="POST" action="#" style="display:table">
            <p style="display:table-row;">
                
                                            <?php $userId = ''; ?>
                                        <table class="table table-striped table-bordered table-list"> 
                                            <thead> 
                                                <tr> 
                                                    <th align='center'>
                                                         
                                                    <!--<th><em class="fa fa-cog"></em></th>-->
                                                    <th>ID</th>
                                                    <th>Name</th> 
                                                    <th>Year</th> 
                                                    <th>Semester</th> 
                                                    <th>Type</th> 
                                                    <th>Teacher</th> 
                                                </tr> 
                                                <?php 
                                                
                                                 foreach ($allCourses as $value) {
                                                     $userId = $value['id'];
                                                     echo "<tr>"; ?>
                                                    <td align='center'><input type="checkbox" value="<?php echo $value['id']; ?>" name="users[]"></td>
                                                     <?php
                                                     echo "<td>".$value['id']."</td>";
                                                     echo "<td>".$value['name']."</td>";
                                                     echo "<td>".$value['year']."</td>";
                                                     echo "<td>".$value['semester']."</td>";
                                                     echo "<td>".$value['type']."</td>";
                                                     $teacher = getTeacher($value['user_id']);
                                                     echo "<td>".$teacher."</td>";
                                                     echo "</tr>";
                                                 }
                                                ?>
                                            </thead>
                                        </table>
            </p>

        </form>
    </div>
</div>

</body>

</html>