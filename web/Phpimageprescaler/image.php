<?php

require_once "PIP/PIP.php";
$pip = new \Phpimageprescaler\PIP\PIP('pip_config.json');
$pip->run();
