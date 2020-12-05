
<script src="scripts/photo_upload.js"></script>

<div class="card photo-card">
    <input type="file" name="image" id="image" onchange="readURL(this);" required accept="image/*"/>
    
    <div id="photo-button">
        <label for="image">  
            <i class="fas fa-plus fa-4x"></i>
            <p>Submit a photo</p>
        </label>
    </div>
</div>

