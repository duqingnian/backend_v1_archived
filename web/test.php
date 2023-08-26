<?php
die();
$data = file_get_contents('php://input','r');

file_put_contents('/www/wwwroot/backend.wuziceshi.xyz/web/data.txt',$data);

echo 'success';

