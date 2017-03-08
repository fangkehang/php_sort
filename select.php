<?php

/**
 *  In-place sort，unstable sort
 *  选择排序算法
 *  思想，每次找到一个最小值，放到最前面
 *  最好：O(n^2) O(n^2)
 *
 **/

function selection_sort() 
{
	$num = array(23,43,22,13,42,45,21);
	//这里只需要循环n-1次
	for($i=0;$i<=5;$i++) {
		$min = $i;
		for($j = $i+1; $j<=6;$j++) {
			if($num[$min] > $num[$j]) {
				$min = $j;
			}
		}
		//交换
		$temp = $num[$i];
		$num[$i] = $num[$min];
		$num[$min] = $temp;
	}
	echo '选择排序算法结果：';
	print_r($num);
}
selection_sort();


/**
 *  递归版的选择排序
 *
 **/
$num = array(23,43,22,13,42,45,21);
$GLOBALS['num'] = $num;

function recursive_selectionSort($p,$q)
{
	if($p<$q) {
		$min = find_min($p,$q);
		//交换
		$temp = $GLOBALS['num'][$p];
		$GLOBALS['num'][$p] = $GLOBALS['num'][$min];
		$GLOBALS['num'][$min] = $temp;
		recursive_selectionSort($p+1,$q);
	}
}
function find_min($p,$q) {
	$min = $p;
	for ($i=$p+1;$i<=$q;$i++) {
		if($GLOBALS['num'][$min] > $GLOBALS['num'][$i]) {
			$min = $i;
		}
	}
	return $min;
}
recursive_selectionSort(0,6);
echo '<br/>递归版的选择排序';
print_r($GLOBALS['num']);










