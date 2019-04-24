<?php
session_start();
date_default_timezone_set('Europe/Paris');
if (isset($_SESSION) && isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != '')
{
    if (isset($_POST) && isset($_POST['msg']))
    {
        @mkdir('/private');
        if (file_exists('/private/chat'))
        {
            $fp = fopen('/private/chat', 'r');
            if (flock($fp, LOCK_EX)) {
                $data = unserialize(file_get_contents('/private/chat'));
                array_push($data, [
                    'login' => $_SESSION['loggued_on_user'],
                    'time' => time(),
                    'msg' => $_POST['msg']
                ]);
                file_put_contents('/private/chat', serialize($data));
            }
            fclose($fp);
        }
        else
        {
            file_put_contents('/private/chat', serialize([[
                'login' => $_SESSION['loggued_on_user'],
                'time' => time(),
                'msg' => $_POST['msg']
            ]]));
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
    </head>
    <body>
        <form method="post" action="speak.php">
            Message: <input type="text" name="msg"/>
            <input type="submit" name="submit" value="OK"/>
        </form>
    </body>
</html>
<?php
}
