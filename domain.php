<?php
#check server domains
set_time_limit(0);
function is_it_ok($domain){
    $real_ip=array("ip1","ip2");
    $ip = gethostbyname(trim($domain));
    if (in_array($ip, $real_ip)){
        #do something what you want
    }else{
        $mes="this ".$domain." maybe parked or expired.\n";
        return $mes;
    }
}
$handle = fopen("/etc/localdomains", "r");
if ($handle){
    $mes="";
    while (($domain = fgets($handle)) !== false) {
        if ($domain!="localhost"){
            $mes.=is_it_ok($domain);
        }
    }
    fclose($handle);
    if ($mes) mail("your@email.com","Domain check",$mes);
}else{
    exit();
}
?>
