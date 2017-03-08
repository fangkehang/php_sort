<?php

/**
 * 堆排序算法
 * unstable sort、In-place sort。
 * 最优时间：O(nlgn) 最差时间：O(nlgn)
 *
 **/
$num = array(0,16,20,3,11,17,8);
$GLOBALS['num'] = $num;

function HeapAdjust($i,$size)
{
	$lchild = 2*$i;
	$rchild = 2*$i+1;
	$max = $i;
	if($i<=floor($size/2)) {  //是叶子节点才调整
		//找到最大值
		if($lchild<=$size && $GLOBALS['num'][$lchild]>$GLOBALS['num'][$max]) {
			$max = $lchild;
		}
		if($rchild<=$size && $GLOBALS['num'][$rchild]>$GLOBALS['num'][$max]) {
			$max = $rchild;
		}
		if($max!=$i) {
			//swap
			$temp  = $GLOBALS['num'][$i];
			$GLOBALS['num'][$i] = $GLOBALS['num'][$max];
			$GLOBALS['num'][$max] = $temp;	
			HeapAdjust($max,$size);//调整后以Max为父节点的子树可能已经不满足堆了
		}
	}
}

function BuildHeap($size)
{
	for($i=floor($size/2);$i>=1;$i--) {  //非叶节点最大序号值为size/2 
		HeapAdjust($i,$size);
	}
}

function HeapSort($size)
{
	BuildHeap($size);
	for ($i=$size;$i>=1;$i--) {
		//swap  交换堆顶和最后一个元素，即每次将剩余元素中的最大者放到最后面 
		$temp  = $GLOBALS['num'][$i];
		$GLOBALS['num'][$i] = $GLOBALS['num'][1];
		$GLOBALS['num'][1] = $temp;
		HeapAdjust(1,$i-1);
	}
}
HeapSort(6);
echo '堆排序算法结果：';
print_r($GLOBALS['num']);


