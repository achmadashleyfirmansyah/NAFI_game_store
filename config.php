<?php
// config.php

// API KEY RAWG
define('RAWG_API_KEY', '54b1c491769f465ab03b5da62288c4d9');
define('RAWG_BASE_URL', 'https://api.rawg.io/api');

// Buat URL request lengkap
function rawg_endpoint($path, $params = []) {
    $params['key'] = RAWG_API_KEY;
    return RAWG_BASE_URL . $path . '?' . http_build_query($params);
}

//  Memanggil API RAWG
function call_rawg($path, $params = []) {
    $url = rawg_endpoint($path, $params);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        curl_close($ch);
        return null;
    }

    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status != 200) {
        return null;
    }

    return json_decode($response, true);
}
