<?php

use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dump')) {
    /**
     * @author Cyrax <cyrax.com>
     */
    function dump($var, ...$moreVars)
    {
        VarDumper::dump($var);

        foreach ($moreVars as $v) {
            VarDumper::dump($v);
        }

        if (1 < func_num_args()) {
            return func_get_args();
        }

        return $var;
    }
}
if (!function_exists('pre')) {
	function pre($data = '',$status = FALSE)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if(!$status){
			die;
		}
	}
}
// if (!function_exists('pre')) {
//     function pre($vars, $status = false)
//     {
//         if (is_array($vars)) {
//             foreach ($vars as $v) {
//                 VarDumper::dump($v);
//             }
//         } else {
//             VarDumper::dump($vars);
//         }
//         if (!$status) {
//             exit(1);
//         }
//     }
// }
