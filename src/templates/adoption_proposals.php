
<section id="user_proposals">
    <h2>Adoption Proposals</h2>
    <?php
        $proposals = getAdoptionProposals($user['Username']);

        if(count($proposals) == 0)
            echo '<p>All your adoption proposals will be displayed here</p>';
        else {
            foreach($proposals as $proposal) {
                include(ROOT . "/templates/cards/adoption_proposal.php");
            }
        }
    ?>
</section>