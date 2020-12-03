<a href="pet_profile.php?id=1"> 
    <div class="card pet-card">
        <div class="favorite-icon">
            <span class="fa-stack fa-x">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="far fa-heart fa-stack-1x fa-inverse"></i>
            </span>
        </div>

        <img src=<?= $pet["Photo"] ?> alt="Pet Photo">

        <footer class="container">
            <p><?= $pet["Name"] ?></p>
        </footer>
    </div>
</a>
