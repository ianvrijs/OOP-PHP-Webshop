<?php

$sHtml = '';
$sHtml ='

<div class="contain">
    <h1 style="text-align: center;"></h1>
    '. product::product() .'
    '. cart::addcart() .'
    <br />
 
</div>



';

return $sHtml;