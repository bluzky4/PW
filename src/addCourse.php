<?php

@session_start();

require_once(dirname(__FILE__) . "/../db_model/User.php");

$allTeachers = getAllTeachers();

?>
<html>

<head>
    <title> Add Course </title>
</head>

<body style="margin: 10px; padding: 10px;">

<div style="position:relative; width:100%;">
    <div style="position:relative; margin:auto; width:30%;">
        <form id="login" method="POST" action="http://localhost/catalog/src/addCourse" style="display:table">
            <p style="display:table-row;">
                <label for="name" style="display:table-cell;">Name: </label>
                <input id="name" type="text" name="name" style="display:table-cell;"/>
            </p>
            <p style="display:table-row;">
                <label for="year" style="display:table-cell;">Year: </label>
                <select id="year" name="year" style="display:table-cell;">
                    <option name="option1" value="Anul 1 - Licenta">Anul 1 - Licenta</option>
                    <option name="option2" value="Anul 2 - Licenta">Anul 2 - Licenta</option>
                    <option name="option3" value="Anul 3 - Licenta">Anul 3 - Licenta</option>
                    <option name="option4" value="Anul 1 - Master">Anul 1 - Master</option>
                    <option name="option5" value="Anul 2 - Master">Anul 2 - Master</option>
                    <option name="option6" value="Anul 1 - Doctorat">Anul 1 - Doctorat</option>
                    <option name="option7" value="Anul 2 - Doctorat">Anul 2 - Doctorat</option>
                </select>
            </p>
            
            <p style="display:table-row;">
                <label for="semester" style="display:table-cell;">Semester: </label>
                <select id="semester" name="semester" style="display:table-cell;">
                    <option name="option1" value="Sem 1">Sem 1</option>
                    <option name="option2" value="Sem 2">Sem 2</option>
                </select>
            </p>
            
            <p style="display:table-row;">
                <label for="type" style="display:table-cell;">Type: </label>
                <select id="type" name="type" style="display:table-cell;">
                    <option name="option1" value="Course">Course</option>
                    <option name="option2" value="Laboratory">Laboratory</option>
                </select>
            </p>
            
            <p style="display:table-row;">
                <label for="teacher" style="display:table-cell;">Teacher: </label>
                <select id="teacher" name="teacher_id" style="display:table-cell;">
                    <?php foreach($allTeachers as $teacher){
                        ?>
                        <option name="<?php echo $teacher['name'];?>" value="<?php echo $teacher['id'];?>"><?php echo $teacher['name'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>

            <p style="display:table-row;">
                <input type="submit" value="Submit" style="display:block;"/>
            </p>

        </form>
    </div>
</div>

</body>

</html>