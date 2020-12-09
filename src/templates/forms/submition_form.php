<h2>Submit Your Pets For Adoption</h2>

<form action="../actions/upload.php" id="pet-submition" method="post" enctype="multipart/form-data">
    <div id="postHead">

        <div id="post-title">
            <label>
                Post Title <input type="text" name="post-title" required>
            </label>
        </div>
    </div>

    <div id="top">
        <?php include(ROOT . "/templates/cards/photo_card.php"); ?>

        <div id="fields">
            <label>
                Pet Name <input type="text" name="name" required>
            </label>

            <label>
                Location <input type="text" name="city" required>
            </label>
            
            <label>
                Weight <input type="number" name="weight" required>
            </label>

            <label>
                Color <input type="text" name="color" required>
            </label>
            
            <div id="extra-fields">
                <div class="same-line">
                    <label for="pet-species">Species</label>

                    <select id="pet-species" name="pet-species">
                        <option value="1">Dog</option>
                        <option value="0">Cat</option>
                        <option value="3">Hamster</option>
                        <option value="2">Hedgehog</option>
                        <option value="4">Fox</option>
                    </select>
                </div>

                <div class="same-line">
                    <label for="pet-size">Size</label>

                    <select id="pet-size" name="pet-size">
                        <option value="0">Small</option>
                        <option value="1">Medium</option>
                        <option value="2">Large</option>
                    </select>
                </div>


                <div class="same-line">
                    <label for="pet-age">Age</label>
                    <input type="number" id="pet-age" name="pet-age" required>
                </div>

                <div id="pet-gender" name="pet-gender">
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">
                        <i class="fas fa-mars fa-3x"></i>
                    </label>

                    <input type="radio" id="female" name="gender" value="female" required>
                    <label for="female">
                    <i class="fas fa-venus fa-3x"></i>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <label class="description">
        Description <textarea id="description" name="description" rows="5"></textarea>
    </label>

    <input type="submit" value="Submit">
</form>