<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 9/25/14
 * Time: 7:14 AM
 */


class letterPieChart {
    //var $data;

    var $data;

    public function arrayFromFile($filename){
        $array = file($filename, FILE_IGNORE_NEW_LINES);
        return $array;
    }
    public function alpha($array){
        $arr =  preg_replace("/[^a-zA-z,.]/", null, $array);
        $arr = array_values( array_filter($arr) );

        return $arr;

    }
    public function toUpper($array){
        $inputString = implode(',', $array);

        //$outputString = strtolower($inputString);
        $outputString = strtoupper($inputString);

        $array = explode(',', $outputString);

        return $array;

    }

    /*public function arrayToAssociative($array){
        $a = $array;
        for ($i = 0; $i < count($array); ++$i) {
            $array[$i]=1;
        }
        $c = array_combine($a,$array);
        //  print_r($c);
        return $c;

    }*/

    public function removeDuplicates($array){
        $a = array();
        $count=0;
        for ($i = 0; $i < count($array); ++$i) {
            if(array_key_exists($array[$i], $a)){
                $count = $a[$array[$i]];
                $count++;
                $a[$array[$i]]=$count;
            }else{
                $a[$array[$i]]= 1;
            }

        }
        ksort($a);
        return $a;
    }

    public function formatArray($array){
        $aKeys = array_keys($array);
        array_unshift($aKeys,'Letter');
        $aValues = array_values($array);
        array_unshift($aValues,'Count');

        $a=array();
        for ($i = 0; $i < count($aKeys); ++$i) {
            $a[$i]= array($aKeys[$i], $aValues[$i]);
        }


        return $a;


    }

}