<?php
session_start();
date_default_timezone_set('Europe/Paris');
if (isset($_SESSION) && isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != '' && file_exists('/private/chat'))
{
    $fp = fopen('/private/chat', 'r');
    if (flock($fp, LOCK_SH)) {
        $data = unserialize(file_get_contents('/private/chat'));
        foreach ($data as $i => $v)
            echo "[". date("H:i", $v['time'])  . "] <b>". $v['login'] ."</b>: ". $v['msg'] ."<br />\n";
    }
    fclose($fp);
}
