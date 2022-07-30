<?php


foreach ($favorites as &$favorite) {
    $slashExplode = explode("/", $favorite["href"]);
    $host = $slashExplode[2];
    $favorite["favicon"] = $slashExplode[0] . "//" . $host . "/favicon.ico";
    $favorite["preview"] = buildPreview($host, $favorite["href"]);
}

// obtenir la preview
$url =....;
$slashExplode = explode("/", $url);
$host = $slashExplode[2];

if ("www.youtube.com" === $host) {
    $videoId = explode("&", explode("=", $url)[1])[0];
}

// html
<?php if(array_key_exists("", $favorites)): ?>
<iframe>....</iframe>
<?php endif; ?>
