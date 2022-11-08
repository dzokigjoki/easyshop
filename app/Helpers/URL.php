<?php

/**
 * Generate the assets path
 *
 * @param $asset string
 * @return string
 */
function url_assets($asset) {
    $base = config('app.assets');

    return rtrim($base, '/') . $asset;
}

function torti_images($asset) {
    $base = '//torti-assets.test';
    return rtrim($base, '/') . $asset;
}