<script src="../scripts/post_form.js"></script>

<?php
    function drawPetCard($pet) {
?>

<div class="card pet-card">
    <span class="pet-id"><?= $pet["PetID"] ?></span>

    <span class="fa-stack fa-x favorite-icon" onclick="favoritePet(event)">
        <i class="fas fa-square fa-stack-2x"></i>
        <i class="far fa-heart fa-stack-1x fa-inverse"></i>
    </span>

    <a href="../pages/adoption_post.php?id=<?= $pet["PetID"] ?>"> 
        <img src="../<?= $pet["Photo"] ?>" alt="Pet Photo">

        <footer class="container">
            <p><?= htmlspecialchars($pet["Name"]) ?></p>
        </footer>
    </a>
</div>

<?php
    }
?>
