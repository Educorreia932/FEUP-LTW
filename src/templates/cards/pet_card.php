<script src="../scripts/post_form.js"></script>

<?php
    function drawPetCard($pet) {
?>

<a href="../pages/adoption_post.php?id=<?= $pet->id ?>"> 
    <div class="card pet-card">
        <div class="favorite-icon">
            <span class="fa-stack fa-x">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="far fa-heart fa-stack-1x fa-inverse"></i>
            </span>
        </div>

        <img src="../<?= $pet->photo ?>" alt="Pet Photo">

        <footer class="container">
            <p><?= htmlspecialchars($pet->name) ?></p>
        </footer>
    </div>
</a>

<?php
    }
?>
