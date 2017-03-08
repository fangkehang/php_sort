<?php

/**
 *  冒泡排序算法
 *	stable sort、In-place sort
 *  最坏：O(n^2),最好：O(n^2)
 *  思路：通过两两交换，像水中的泡泡，大的先冒，小的后冒
 *
 **/

function bubble()
{
	$num = array(23,43,22,13,42,45,21);
	for($i=0;$i<=6;$i++) {
		for($j=6;$j>$i;$j--) {
			if($num[$j] < $num[$j-1]) {
				//交换
				$temp = $num[$j];
				$num[$j] = $num[$j-1];
				$num[$j-1] = $temp;	
			}	
		}
	}
	echo '冒泡排序算法结果：';
	print_r($num);
}
bubble();


/**
 *  递归版的冒泡排序
 *
 **/
$num = array(23,43,22,13,42,45,21);
$GLOBALS['num'] = $num;

function recursive_BubbleSort($p,$q) 
{
	if ($p<$q) {
		findmin($p,$q);
		recursive_BubbleSort($p+1,$q);
	}
}
function findmin($p,$q) 
{
	for ($i=$q;$i>=$p+1;$i--) {
		if($GLOBALS['num'][$i]<$GLOBALS['num'][$i-1]) {
			//交换
			$temp = $GLOBALS['num'][$i];
			$GLOBALS['num'][$i] =  $GLOBALS['num'][$i-1];
			$GLOBALS['num'][$i-1] = $temp;	
		}
	}
}
recursive_BubbleSort(0,6);
echo '<br/>递归版的冒泡排序：';
print_r($GLOBALS['num']);


/**
 *  改进版的冒泡排序
 *  最佳运行时间改成O(n)
 **/
$num = array(11,43,22,13,42,45,21);
$GLOBALS['num'] = $num;

function improved_bubble_sort($flag = true) {
	for($i=0;$i<=5;$i++) {
		if ($flag == false) return;
		$flag = false;
		for($j=6;$j>$i;$j--) {	
			if($GLOBALS['num'][$j] < $GLOBALS['num'][$j-1]) {
				//交换
				$temp = $GLOBALS['num'][$j];
				$GLOBALS['num'][$j] = $GLOBALS['num'][$j-1];
				$GLOBALS['num'][$j-1] = $temp;
				$flag = true;	
			}	
		}
	}
	
}
improved_bubble_sort();
echo '<br/>改进版冒泡排序算法结果：';
print_r($GLOBALS['num']);




