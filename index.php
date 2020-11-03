<?php
    include_once("templates/common/header.php");
?>

    <div id="search-bar">
        <form action="">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <h2>Pets for Adoption</h2>

    <section id="adoption">
        <div class="pet-card">
            <img src="http://placekitten.com/200/200" alt="Pet Photo">

            <div class="container">
                <i class="far fa-heart"></i>
                <p>Pet Name</p>
             </div>
        </div>
    </section>
</body>

</html>