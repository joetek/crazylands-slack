<?php
header('Content-Type: application/json');


$out['response_type'] = 'in_channel';
$out['text'] = ".\n".'<@'.$_POST['user_name'].'> thinks . o O ( '.$_POST['text'].' )';

echo json_encode($out);
