<?php

/**
 *  插入排序算法
 *  stable sort、In-place sort
 *  数组排好序，复杂度为O(n); 倒序复杂度为O(n^2)
 *  比较适合用于少量元素的数组
 *  思路：类似扑克牌整理法，把后面的牌插到前面排好序的。  
 *
 **/

function insert_sort() 
{
	$num = array(12,32,13,18,23,37,45);
	for($i=1;$i<6;$i++) {
		$j = $i-1;
		$key = $num[$i];
		//算法导论中提到这里不能用二分法来提高效率，因为用二分法，O(lgn)查找到了插入的位置，但还要用O(n)的时间移出空位
		while($j>=0 && $num[$j]>$key) {
			$num[$j+1] = $num[$j];
			$j--;
		}
		//----
		$num[$j+1] = $key;
	}
	echo '插入排序算法结果：';
	print_r($num);
}

insert_sort();


/**
 *  递归法插入排序
 *
 **/

$num = array(12,32,13,18,23,45,37);
$GLOBALS['num'] = $num;

function Recursive_InsertionSort($p,$q) 
{
	if($p < $q) {
		Recursive_InsertionSort($p,$q-1);//递归排序$num[$p...$q-1]
		Insert($p,$q-1);
	}
}
function Insert($p,$q)
{
	$key = $GLOBALS['num'][$q+1];
	$j = $q;
	while ($j > 0 && $GLOBALS['num'][$j] > $key) {
		$GLOBALS['num'][$j+1] = $GLOBALS['num'][$j];
		$j--;
	}
	$GLOBALS['num'][$j+1] = $key;
}
Recursive_InsertionSort(0,6);
echo "<br/>递归法插入排序结果：";
print_r($GLOBALS['num']);
