<?php
function add_into_log($log_type, $log_string){
    switch($log_type){
        case 'admin':
            file_put_contents(__DIR__.'/admin.log', $log_string."\n", FILE_APPEND);
            break;
        case 'error':
            file_put_contents(__DIR__.'/error.log', $log_string."\n", FILE_APPEND);
            break;
        case 'login':
            file_put_contents(__DIR__.'/login.log', $log_string."\n", FILE_APPEND);
            break;
        default:
            file_put_contents(__DIR__.'/error.log', 'Could not write into log file or the functions parameters were incorrect! ', FILE_APPEND);
            break;
    }
}
?>