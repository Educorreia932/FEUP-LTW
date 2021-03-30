<?php
    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']) && $_SESSION['username'] == $author_name) {

?>

<h2>Pending Proposals</h2>
<section id="adoption_post_proposals">
    <?php
        if(count($proposals) == 0)
            echo('<p>All the pending adoption proposals will be displayed here.</p>');
        else {
            $proposal_count = 1;

            foreach ($proposals as $proposal) {
                if($proposal['Answered'] == 0) { 
                    include(__DIR__ . "/cards/post_proposal.php");
                    $proposal_count = $proposal_count + 1;
                }
            }
        }

    ?>
</section>

<?php
    }
?>  