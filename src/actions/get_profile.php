<?php
    include_once(__DIR__ . "/../config.php");

    $pet_id = $_GET["id"];
    echo '<form action="pet_profile.php" method="post">'.
        '<input type="hidden" name="petId" value="'.$pet_id.'"/>'.
        '<a href="#" onclick="this.parentNode.submit()"></a>'.
        '</form>';
?>