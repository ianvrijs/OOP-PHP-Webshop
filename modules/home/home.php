<?php
if(isset($_GET['msg'])){
    $message = secure($_GET['msg']);
}
else {
    $message = '';
}
function secure($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
$sHtml = '

<h1>
'.$message.'
</h1>



<div class="features" id="info">
    <h1>Why you should pick us</h1>
    <p>COB (chairs over birches)</p>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" class="fa" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <h3>HTML5 specialist</h3>
            <p>Learn the number #1 markup language!</p>
        </div>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" class="fa" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3>HTML5 specialist</h3>
            <p>Learn the number #1 markup language!</p>
        </div>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" class="fa" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3>HTML5 specialist</h3>
            <p>Learn the number #1 markup language!</p>
        </div>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" class="fa" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3>HTML5 specialist</h3>
            <p>Learn the number #1 markup language!</p>
        </div>
</div>
    <div class="parallax"></div>

    <h1>something about how good we are!</h1>
';

return $sHtml;
?>