<?php

require "../models/patientProfileUser.php";

$res =getAll();
echo json_encode($res);

?>