<?php

/**
 *  stable sort、Out-place sort
 *  归并排序算法
 *  思想，运用分治法思想解决排序问题。
 *  最坏情况运行时间：O(nlgn)
 *  最佳运行时间：O(nlgn)
 *
 **/
$num = array(23,43,22,13,42,45,21);
$GLOBALS['num'] = $num;

function recursive_merge_sort($p,$q)
{
	if($p<$q) {
		$m = floor(($p+$q)/2);
		recursive_merge_sort($p,$m);
		recursive_merge_sort($m+1,$q);
		merge($p,$m,$q);
	}
}
function merge($p,$m,$q) 
{
	$a = $m - $p + 1;
	$b = $q - $m;
	for ($i=1;$i<=$a;$i++) {
		$L[$i] = $GLOBALS['num'][$p+$i-1];
	}
	for ($i=1;$i<=$b;$i++) {
		$R[$i] = $GLOBALS['num'][$m+$i];
	}
	//设置这两个，之后的比较整合中，只要该数组用完，因为最后的数无穷大，所以就不会被选到。
	$L[$a+1] = INF;
	$R[$b+1] = INF;
	$i = $j = 1;
	for ($k=$p;$k<=$q;$k++) {
		if($L[$i]<$R[$j]) {
			$GLOBALS['num'][$k] = $L[$i];
			$i++;
		}else{
			$GLOBALS['num'][$k] = $R[$j];
			$j++;
		}
	}
}
recursive_merge_sort(0,6);
echo '归并排序算法结果：';
print_r($GLOBALS['num']);

