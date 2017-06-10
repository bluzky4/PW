<!DOCTYPE html>
<html>

<head>
    <title> Add Clases </title>
</head>

<body style="margin: 10px; padding: 10px;">

<div style="position:relative; width:100%;">
    <div style="position:relative; margin:auto; width:30%;">
        <form id="login" method="POST" action="http://localhost/catalog/src/addClass" style="display:table">
            <p style="display:table-row;">
                <label for="name" style="display:table-cell;">Name: </label>
                <input id="name" type="text" name="name" style="display:table-cell;"/>
            </p>

            <p style="display:table-row;">
                <input type="submit" value="Submit" style="display:block;"/>
            </p>

        </form>
    </div>
</div>

</body>

</html>