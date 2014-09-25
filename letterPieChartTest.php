<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 9/25/14
 * Time: 7:39 AM
 */

require_once('letterPieChart.php');

class letterPieChartTest extends PHPUnit_Framework_TestCase {

    /*
     * Test that sample data exist.
     */
    public function testFile(){
        $this->assertTrue(file_exists('letters.txt'));
        $this->assertTrue(file_exists('letters_duplicate.txt'));
        $this->assertTrue(file_exists('letters_gibberish.txt'));
        $this->assertTrue(file_exists('letters_gibberish2.txt'));

    }
    /*
     * Test that array is made from file contents.
     */
    public function testArrayFromFile(){

        $expected = array(a,b,c,d,e);
        $a = new letterPieChart();
        $b = $a->arrayFromFile('letters.txt');
        $this->assertEquals($expected,$b );
        print_r('Compare method output to expected array'.PHP_EOL);
        print_r('_testArrayFromFile(): '.PHP_EOL);
        /* print_r('   Expected: '.PHP_EOL);
         print_r($expected);
         print_r('   Actual: '.PHP_EOL);
         print_r($b);
         */

    }

    /*
     * Alpha removes non alpha characters and shortens array where null.
     */
    public function testAlpha(){
        $a = new letterPieChart();
        $b = $a->arrayFromFile('letters_gibberish.txt');
        $c = $a->alpha($b);
        $this->assertEquals(5,count($c));
        $expected = array(
            0=>a,
            1=>b,
            2=>c,
            3=>d,
            4=>e
        );
        $this->assertEquals($expected,$c);
        //print_r($c);
    }

    /*
     * Converts array to uppercase.
     */
    public function testToUpper(){
        $a = new letterPieChart();
        $b = $a->arrayFromFile('letters_gibberish.txt');
        $c = $a->alpha($b);
        $d = $a->toUpper($c);
        $expected = array(
            0=>A,
            1=>B,
            2=>C,
            3=>D,
            4=>E
        );
        $this->assertEquals($expected,$d);
        //print_r($d);
    }
    /*
     * Initially was method to keep count but was replaced by removeDuplicates.
     */

    /*
    public function testArrayToAssociative(){
        $a = new letterPieChart();
        $b = $a->arrayFromFile('letters.txt');
        $c = $a->alpha($b);
        $d = $a->toUpper($c);
        $i = $a->arrayToAssociative($d);
        foreach ($d as &$value) {
            $this->assertEquals(1,$value);
        }
        print_r(PHP_EOL.'Turn array into associative where Value (intially set to 1) will be used for count.'.PHP_EOL);
        print_r('_testArrayToAssociative()');
        print_r($d);
    }*/

    /*
     * Removes duplicates and adds a counter.
     */
    public function testRemoveDuplicates(){
        $data =
            array(
                'A'=> 11,
                'B'=> 2,
                'C'=> 2,
                'D'=> 2,
                'E'=> 7
            );

        $a = new letterPieChart();
        $b = $a->arrayFromFile('letters_duplicate.txt');
        //print_r($b);
        $c = $a->alpha($b);
        //print_r($c);
        $d = $a->toUpper($c);
        //print_r($d);
        //$e = $a->arrayToAssociative($d); -- don't need
        //print_r($e);
        $i = $a->removeDuplicates($d);

        $this->assertEquals($data,$i);
        //print_r('RemoveDuplicates also acts as CountDuplicates. Creates new unique array with counter stored as value.'.PHP_EOL);
        //print_r('_testRemoveDuplicates()'.PHP_EOL);
        //print_r($i);

    }

    /*
     * Takes the sorted array and formats it for Google Charts
     */
    public function testFormatArray(){
        $data =  array(
            array('Letter', 'Count'),
            array('A', 11),
            array('B', 2),
            array('C', 2),
            array('D', 2),
            array('E', 7)
        );

        $a = new letterPieChart();
        $b = $a->arrayFromFile('letters_duplicate.txt');
        $c = $a->alpha($b);
        $d = $a->toUpper($c);
        $e = $a->removeDuplicates($d);
        $f = $a->formatArray($e);
        // print_r($d);
        $this->assertEquals($data,$f);



    }


}
