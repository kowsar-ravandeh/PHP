<?php
session_start();
//همه session هارا حذف می کند
session_destroy();
exit(header("Location: index.php"));
?>