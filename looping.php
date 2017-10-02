<?php 
/* function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return factorial($n - 1) * $n;
    }
}
 
function combinations($n, $k) {
    //note this defualts to 0 if $n < $k
    if ($n < $k) {
        return 0;
    } else {
        return factorial($n)/(factorial($k)*factorial(($n - $k)));
    }
}
echo combinations(5, 3);
 */
ini_set('memory_limit', '-1');
require_once 'tools/Math_Combinatorics/Math_Combinatorics-1.0.0/Combinatorics.php';
for($a=1; $a<35; $a++){
	$x[] = $a;
}
$combinatorics = new Math_Combinatorics;
$i = 0;
$arr = $combinatorics->combinations($x, 6);
var_dump($arr); die;
foreach($arr as $combi) {
	// echo join('', $combi). "<br />"; 
	$i++;
	usleep(100);
	/* foreach($x as $anum){
		echo join('', $combi).$anum, "<br />"; 
		$i++;
	} */
}
echo $i;
?>