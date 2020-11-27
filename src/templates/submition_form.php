<h2>Submition Form</h2>
<form action="actions/submit_pet.php" id="submition_post" method="post">
    <div id="submits">
        <label>
            Pet Name: 
            <input type="text" name="name">
        </label>
        <label>
            City: <input type="text" name="city">
        </label>
        <label>Species: </label>
            <select name="species" id="pet_species">
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="hamster">Hamster</option>
            <option value="hedgehog">Hedgehog</option>
        </select>
        <label>
            Age: <input type="number" name="age">
        </label>
    </div>
    <label class="description">Small description:
        <textarea id="description" name="description" rows="4" cols="40"></textarea>
    </label>
    <button type="submit">Submit New Pet!</button>
</form>