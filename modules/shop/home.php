<?php
$sHtml = '

<div class="contain">
  .   <h1 style="text-align: center;">Recent products</h1>
    '. product::recentCards() .'
</div>
<div class="container">
    <a class="viewMore" href="index.php?module=shop&page=products">
    View all products..
    </a>
    
</div>
';

return $sHtml;
?>