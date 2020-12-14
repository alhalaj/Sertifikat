<?php
 header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
 header('Cache-Control: no-store, no-cache, must-revalidate');
 header('Cache-Control: post-check=0, pre-check=0', FALSE);
 header('Pragma: no-cache');
 header( "Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT" );
 session_start();
?>