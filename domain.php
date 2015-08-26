<?php
#check server domains
set_time_limit(0);
function is_it_ok($domain){
    $real_ip=array("ip1","ip2");
    $ip = gethostbyname(trim($domain));
    if (in_array($ip, $real_ip)){
        #do something what you want
    }else{
        mail("your@email",$domain,"this ".$domain." maybe parked");
    }
}
$handle = fopen("/etc/localdomains", "r");
if ($handle) {
    while (($domain = fgets($handle)) !== false) {
        if ($domain!="localhost"){
            is_it_ok($domain);
        }
    }
    fclose($handle);
} else {
    exit();
}
?>
