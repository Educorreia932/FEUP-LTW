<h2>Submition Your Pets For Adoption</h2>

<form action="actions/submit_pet.php" id="pet-submition" method="post">
    <label>
        Pet Name <br> <input type="text" name="name">
    </label>

    <label>
        Location <input type="text" name="city">
    </label>
    
    <div id="extra-fields">
        <label id="pet-species">
            Species
            <select name="species">
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="hamster">Hamster</option>
                <option value="hedgehog">Hedgehog</option>
                <option value="fox">Fox</option>
            </select>
        </label>

        <label id="pet-age">
            Age <input type="number" name="age">
        </label>

        <div id="pet-gender">
            <button id="male"><i class="fas fa-mars fa-4x"></i></button>
            <button id="female"><i class="fas fa-venus fa-4x"></i></button>
        </div>
    </div>

    <label class="description">
        Description <textarea id="description" name="description" rows="5"></textarea>
    </label>

    <button type="submit">Submit</button>
</form>