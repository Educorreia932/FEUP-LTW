<!DOCTYPE html>
<html>
    <head>
        <title>Exercise 4</title>
    </head>

    <body>
        <?php
            $num1  = $_GET["num1"];
            $num2  = $_GET["num2"];

            $result = $num1 + $num2;

            echo $num1 . " + " . $num2 . " = " . $result;
        ?>

        <br>
        
        <a href="form2.html">Go back to form</a>
    </body>
</html>

