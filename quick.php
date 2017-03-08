<?php

/**
 *  unstable sort、In-place sort
 *  快速排序算法
 *  思想也是分治法，每一次把一个基准数，左边小于它，右边大于它，然后再把左右两边递归。
 *  最坏运行时间：当输入数组已排序时（不管正序还是反序），时间为O(n^2),可以用随机化算法来优化
 *  最佳运行时间：O(nlgn)
 *  
 **/

$num = array(23,43,22,13,42,45,21);
$GLOBALS['num'] = $num;

function recursive_quick_sort($p,$q)
{
	if($p<$q) {
		$r = randomized_partition($p,$q);
		recursive_quick_sort($p,$r-1);
		recursive_quick_sort($r+1,$q);
	}
}
function partition($p,$q) 
{
	$x = $GLOBALS['num'][$p]; 
	$i = $p;
	for ($j=$p+1;$j<=$q;$j++) {
		if($GLOBALS['num'][$j] < $x) { 
			$i++;
			$temp = $GLOBALS['num'][$i];   
			$GLOBALS['num'][$i] = $GLOBALS['num'][$j];
			$GLOBALS['num'][$j] = $temp;
		}
	}
	$temp = $GLOBALS['num'][$p];
	$GLOBALS['num'][$p] = $GLOBALS['num'][$i];
	$GLOBALS['num'][$i] = $temp;
	return $i;
}

/**
 *  随机化快速排序
 **/
function randomized_partition($p,$q) 
{
	$n = $q - $p + 1;
	$gap = rand(0,$n-1);
	//swap
	$temp = $GLOBALS['num'][$q];
	$GLOBALS['num'][$q] = $GLOBALS['num'][$p+$gap];
	$GLOBALS['num'][$p+$gap] = $temp;
	return partition($p,$q);
}

recursive_quick_sort(0,6);
echo '快速排序算法：';
print_r($GLOBALS['num']);








