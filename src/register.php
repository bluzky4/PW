<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

@session_start();

require_once(dirname(__FILE__) . "/index.php");
?>



<!DOCTYPE html>
<html>

<head>
    <title> Register Page</title>
</head>

<body style="margin: 10px; padding: 10px;">

<div style="position:relative; width:100%;">
    <div style="position:relative; margin:auto; width:30%;">
        <form id="login" method="POST" action="http://localhost/catalog/src/user" style="display:table">
            <p style="display:table-row;">
                <label for="username" style="display:table-cell;">Username: </label>
                <input id="username" type="text" name="username" required="" style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">
                <label for="first_name" style="display:table-cell;">First Name: </label>
                <input id="first_name" type="text" name="first_name" required="" style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">
                <label for="last_name" style="display:table-cell;">Last name: </label>
                <input id="last_name" type="text" name="last_name" required="" style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">
                <label for="phone" style="display:table-cell;">Phone: </label>
                <input id="phone" type="text" name="phone" required="" style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">

                <label for="email" style="display:table-cell;">Email: </label>
                <input id="email" type="text" name="email" required=""  style="display:table-cell;"/>
            </p>
            
            <p style="display:table-row;">

                <label for="role" style="display:table-cell;">Role: </label>
                <select id="role" name="role" style="display:table-cell;">
                    <option name="option1" value="1">Secretary</option>
                    <option name="option2" value="2">Teacher</option>
                    <option name="option3" value="3">Student</option>
                </select>
            </p>

            <p style="display:table-row;">
                <label for="password" style="display:table-cell;">Password: </label>
                <input id="password" type="password" name="password" required=""  style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">
                <label for="password_confirm" style="display:table-cell;">Password confirmation:  </label>
                <input id="password_confirm" type="password" name="password_confirm" required="" style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">
                <input type="submit" value="Submit" style="display:block;"/>
            </p>

        </form>
    </div>
</div>

</body>

</html>

