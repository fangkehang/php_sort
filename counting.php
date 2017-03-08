<?php

/**
 * 计数排序
 * stable sort、out-place sort。
 * 最坏情况运行时间：O(n+k)
 * 最好情况运行时间：O(n+k)
 * 但这种方法会需要很大的空间资源，所以大数据不能采用该方法，并且数据最大值要先知道
 **/

function counting_sort($k)//$k是要排列的数的最大值
{
	$num = array(5,2,3,4,6,3,7);
	$n = 6;
	for ($i=0;$i<=$k;$i++) {   //数据的取值范围从1-7初始化为0
		$C[$i] = 0;
	}
	for ($i=0;$i<=$n;$i++) {   //统计数组num，值为i的元素的个数
 		$C[$num[$i]]++;
 		$B[$i+1] = 0;//初始化B数组
	}
	for ($i=1;$i<=$k;$i++) {   //统计数组num，值小于或者等于i的元素的个数，得出的是i的排位
		$C[$i] = $C[$i] + $C[$i-1];
	}
	for ($i=$n;$i>=0;$i--) {  //把数组num的值填入对应的排位
		$B[$C[$num[$i]]] = $num[$i];
		$C[$num[$i]]--;  //如果有两个相同的，这样减掉之后才会正确		
	}
	echo '计数排序结果：';
	print_r($B);
}
counting_sort(7);