
<a class="notification" href="../pages/adoption_post.php?id=<?= $notification["PetID"] ?>">
    <?php
        if($notification['NotificationType'] == "NewProposal") {
            echo '<header>New adoption proposal for ' . getPet($notification['PetID'])['Name'] . '</header>';
            $author_name = getUserByID(getPost($notification['PetID'])['AuthorID']);
            echo '<p id="notification-text">@'. $author_name . ' - ' . $notification['Text'] . '</p>';
        } else {
            if($notification['Answered'] == -1) {
                $answer = "refused";
                $color = "red";
            } else {
                $answer = "accepted"; 
                $color = "green";
            } 
            echo '<header>Adoption proposal for ' . getPet($notification['PetID'])['Name'] . ' <span style="color:'.$color.'">' . $answer . '</span></header>';
            echo '<p id="notification-text">'. $notification['Text'] . '</p>';
        }
    ?>
</a>