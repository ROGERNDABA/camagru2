<?php
class General {
    function __construct() {}
    public function CheckRequest($header) {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            if(!$_SERVER['HTTP_X_REQUESTED_WITH']== $header){
                http_response_code(403);
                // header("Location: /public/error_pages/403.php");
                exit;
            }
        } else {
            http_response_code(403);
            // header("Location: /public/error_pages/");
            exit;
        }
    }
}
?>