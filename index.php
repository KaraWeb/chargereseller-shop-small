<?php 
    include 'config.php';
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    
    if (isMobile() && htmlspecialchars($_GET["view"]) != 'desktop') {
        include "mobile/mobile-view.php";
    } else {
        include "desktop-view.php";
    }
?>