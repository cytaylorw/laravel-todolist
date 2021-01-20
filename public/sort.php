<?php
$unsorted_array = empty($_GET['list']) ? 
    [12, 4, 62, 97, 26] : json_decode('['.$_GET['list'].']');
$length = count($unsorted_array);

/* 
    Selection Sort
*/

$selection_array = $unsorted_array;
echo '<h1>Selection Sort</h1>';
echo sprintf('Start: %s <br>',print_r($selection_array, true));
for ($i=0; $i < $length - 1; $i++) { 
    for ($j=$i; $j < $length; $j++) { 
        if($j == $i || $selection_array[$j] < $min){
            $min = $selection_array[$j];
            $min_index = $j;
        }
    }
    $selection_array[$min_index] = $selection_array[$i];
    $selection_array[$i] =  $min;
    echo sprintf('Start index %d: %s <br>',$i,print_r($selection_array, true));
}

/* 
    Insertion Sort
*/

$insertion_array = $unsorted_array;
echo '<h1>Insertion Sort</h1>';
echo sprintf('Start: %s <br>',print_r($insertion_array, true));
for ($i=1; $i < $length; $i++) { 
    $current = $insertion_array[$i];
    for ($j=$i - 1; $j >= 0 ; $j--) { 
        if($current < $insertion_array[$j]){
            $insertion_array[$j + 1] = $insertion_array[$j];
        }else{ 
            break;
        }
    }
    $insertion_array[$j + 1] = $current;
    echo sprintf('Start index %d: %s <br>',$i,print_r($insertion_array, true));
}

/* 
    Bubble Sort
*/

$bubble_array = $unsorted_array;
echo '<h1>Bubble Sort</h1>';
echo sprintf('Start: %s <br>',print_r($bubble_array, true));
$exchange = false;
$step = 1;
do{
    for ($i=1; $i < $length; $i++) { 
        if($i === 1)  $exchange = false;
        if($bubble_array[$i] < $bubble_array[$i - 1]){
            $value = $bubble_array[$i];
            $bubble_array[$i] = $bubble_array[$i - 1];
            $bubble_array[$i - 1] = $value;
            $exchange = true;
        }
    }
    echo sprintf('Step %d: %s <br>',$step,print_r($bubble_array, true));
    $step++;
}while($exchange);