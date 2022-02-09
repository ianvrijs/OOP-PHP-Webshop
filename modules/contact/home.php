<?php
$sHtml = '

<div class="content">
<form action="index.php?module=contact&page=contact-action" method="POST" class="form">
    <div class="form-group">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Naam" tabindex="1" required>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" tabindex="2" required>
    </div>
    <div class="form-group">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" tabindex="3" required>
    </div>
    <div class="form-group">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
    </div>
    <div>
        <button type="submit" class="btn">Send Message!</button>
    </div>
    <br />
</form>
</div>

';

return $sHtml;
?>