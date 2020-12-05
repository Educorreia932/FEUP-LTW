<?php
    $proposals = getAdoptionProposals($user['Username']);
?>

<section id="user_proposals">
    <h2>Adoption Proposals</h2>
    <?php
        if(count($proposals) == 0)
            echo '<p>All your adoption proposals will be displayed here</p>';
        else {
            foreach($proposals as $prop) {
                //include("cards/proposal_card.php");
            }
        }
    ?>
</section>