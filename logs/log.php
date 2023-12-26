<?php
function add_into_log($log_type, $log_string){
    switch($log_type){
        case 'admin':
            file_put_contents(__DIR__.'/admin.log', date('m/d/Y h:i:s a', time()).' | '.$log_string.' | IP - '.$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND);
            break;
        case 'error':
            file_put_contents(__DIR__.'/error.log', date('m/d/Y h:i:s a', time()).' | '.$log_string.' | IP - '.$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND);
            break;
        case 'login':
            file_put_contents(__DIR__.'/login.log', date('m/d/Y h:i:s a', time()).' | '.$log_string.' | IP - '.$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND);
            break;
        default:
            file_put_contents(__DIR__.'/log.log', '!DEFAULT case | '.date('m/d/Y h:i:s a', time()).' | '.$log_string.' | IP - '.$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND);
            break;
    }
}
?>