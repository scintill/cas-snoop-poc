<?php

function getAuthed($url, $key) {
    $timestamp = date('Y-m-d H:i:s');
    $hmac = base64_encode(hash_hmac('sha512', $url.$timestamp, $key->sharedSecret, true));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: URL-Encoded-API-Key {$key->wsId},{$hmac},{$timestamp}"));
    $response = curl_exec($ch);

    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);

    if ($status != 200) {
        throw new RuntimeException('error fetching '.$url.', status code '.$status);
    }

    return $response;
}
