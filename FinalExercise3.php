<?php

class FinalExercise3{
    public $num = array("two"=>"2", "four"=>"4", "six"=>"6", "eight"=>"8", "ten"=>"10");

    public function myPrint(){
        foreach($this->num as $x => $x_value){
            echo "". $x. " - ". $x_value. " <br>";
        }
    }
}

$arr = new FinalExercise2();
$arrCloned = clone $arr;

//printing original array
echo "<br> This is original array: <br>";
print_r($arr);
echo "<br><br>";

//printing cloned array
echo "<br> This is cloned array: <br>";
print_r($arrCloned);
echo "<br><br>";


$data = serialize($arr);
file_put_contents('Text1.txt', $data);
$data = file_get_contents('Text1.txt');
$arr = unserialize($data);
$arr->myPrint(); 
?>