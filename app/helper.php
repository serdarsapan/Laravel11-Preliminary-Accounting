<?php
use Illuminate\Support\Str;

if (!function_exists('generateOTP')) {
    function generateOTP($n){
        $generator = "1357902468";
        $result = '';
        for ($i=1; $i <= $n; $i++) {
            $result = substr($generator,(rand()%(strlen($generator))),11);
        }
        return $result;
    }
}
?>