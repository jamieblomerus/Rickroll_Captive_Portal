<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');

?>

<HTML>
    <HEAD>
        <title>Free wifi</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>body { margin: 0; background-color: black; } p, h1 { color: white; } span, ul { color: grey; font-size: 75%; } ul { list-style-position: inside; padding-left: 5px; } button { background-color: gray; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; } video { margin-bottom: 10px; } div { text-align: center; margin-top: 5vh; }</style>
    </HEAD>

    <BODY>
        <div>
            <h1>Connecting to open WiFi's is dangerous</h1>
            <p>Hackers use fake wifis to hack unsuspecting victims and steal their sensitive information for their own gain. We could have used this method to hack you, but choose to use it for good purposes. Please refrain from using unsecure wifis in the future :>)</p>
<p><strong>Enjoy the rickroll instead</strong></p>
<video id="rickroll" width="300" src="video.mp4" playsinline autoplay controls>
</video>
<script>
document.getElementById('rickroll').play();
</script>


            <form method="POST" action="/captiveportal/index.php">
                <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                <input type="hidden" name="target" value="<?=$destination?>">
                <button type="submit">Continue to WiFi <strong>(Unsafe)</strong></button><br><br>
                <span>If you continue please note that we may save the following information for statistical purposes:</span>
                <ul>
                    <li>Hostname (most often the name of your device)</li>
                    <li>MAC-address (an unique identifier for your device's network module)</li>
                    <li>Local IP-adress (An unique identifier for your device on only this network)</li>
                </ul>
            </form>

        </div>

    </BODY>

</HTML>
