<?php

require "../models/reportUser.php";

$res =getAll();
echo json_encode($res);

?>