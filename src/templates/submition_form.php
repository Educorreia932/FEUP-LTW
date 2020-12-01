<h2>Submition Your Pets For Adoption</h2>

<form action="actions/submit_pet.php" id="pet-submition" method="post">
    <div id="top">
        <?php include("cards/photo_card.php"); ?>
    
        <div id="fields">
            <label>
                Pet Name <input type="text" name="name">
            </label>
    
            <label>
                Location <input type="text" name="city">
            </label>
            
            <div id="extra-fields">
                <div class="same-line">
                    <label for="pet-species">Species</label>
    
                    <select id="pet-species">
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Hamster">Hamster</option>
                        <option value="Hedgehog">Hedgehog</option>
                        <option value="Fox">Fox</option>
                    </select>
                </div>
    
                <div class="same-line">
                    <label for="pet-age">Age</label>
                    <input type="number" id="pet-age">
                </div>
    
                <div id="pet-gender">
                    <button type="button" id="male"><i class="fas fa-mars fa-4x"></i></button>
                    <button type="button" id="female"><i class="fas fa-venus fa-4x"></i></button>
                </div>
            </div>
        </div>
    </div>

    <label class="description">
        Description <textarea id="description" name="description" rows="5"></textarea>
    </label>

    <button type="submit">Submit</button>
</form>