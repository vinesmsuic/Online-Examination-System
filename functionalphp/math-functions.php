<?php
    function getMedian($arr) {
        //Make sure it's an array.
        if(!is_array($arr)){
            throw new Exception('$arr must be an array!');
        }
        //If it's an empty array, return FALSE.
        if(empty($arr)){
            return false;
        }
        //Count how many elements are in the array.
        $num = count($arr);
        //Determine the middle value of the array.
        $middleVal = floor(($num - 1) / 2);
        //If the size of the array is an odd number,
        //then the middle value is the median.
        if($num % 2) { 
            return $arr[$middleVal];
        } 
        //If the size of the array is an even number, then we
        //have to get the two middle values and get their
        //average
        else {
            //The $middleVal var will be the low
            //end of the middle
            $lowMid = $arr[$middleVal];
            $highMid = $arr[$middleVal + 1];
            //Return the average of the low and high.
            return (($lowMid + $highMid) / 2);
        }
    }

    function getAverage($arr) {
        //Make sure it's an array.
        if(!is_array($arr)){
            throw new Exception('$arr must be an array!');
        }
        //If it's an empty array, return FALSE.
        if(empty($arr)){
            return false;
        }
        else
        {
            $avg = array_sum($arr) / count($arr);

            return $avg;
        }
    }

?>