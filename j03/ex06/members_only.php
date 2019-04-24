<?php if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys'): ?>
<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,<?= base64_encode(file_get_contents('../img/42.png')) ?>'>
</body></html>
<?php else: ?>
<?php header("WWW-Authenticate: Basic realm=''Espace membres''"); ?>
<?php header('Connection: close'); ?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php endif ?>
