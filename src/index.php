<?php
    include_once("templates/common/header.php");
?>

    <div id="search-bar">
        <form action="">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <h2>Available Pets for Adoption</h2>

    <section id="adoption">

    <?php
        for ($i = 0; $i < 3; $i++) {
    ?>

        <div class="pet-card">
            <div class="favorite-icon">
                <i class="far fa-heart"></i>
            </div>

            <img src="http://placekitten.com/200/200" alt="Pet Photo">

            <div class="container">
                <p>Pet Name</p>
             </div>
        </div>

    <?php 
        } 
    ?>

    </section>
</body>

</html>