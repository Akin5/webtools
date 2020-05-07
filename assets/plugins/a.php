<?php

function ok($p) {
    return 'sip bisa nih di w'.$p;
}

$string = "
<h1>{ rand(1, 50) }</h1>
<h1>{ rand(50, 100) }</h1>
";


preg_match_all("/{(|\s+)((.*?)\((.*?)\)?)(|\s+)}/", $string, $output);
if(array_key_exists(3,$output)) {
    foreach($output[3] as $key => $functionName) {
        $functionName = trim($functionName);
        $params = [];
        foreach(explode(',', $output[4][$key]) as $param) {
            $params[] = trim(trim($param,'\''),'"');
        }
        $callfunc = call_user_func_array($functionName, $params);
        
        echo $callfunc; // datanya mau lo kelola seperti apa silakan custom sendiri
    }
}
// else: jika fungsi tidak dapat ditemukan silakan atur sndiri
