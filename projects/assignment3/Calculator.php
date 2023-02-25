
<?php 

class Calculator {

    private $operator;
    private $int1;
    private $int2;
    private $answer = "";

    public function calc($operator="",$int1=null,$int2=null){
        echo "<br>";
        // echo $int1, " ", $operator, " ",  $int2, " = ";

        if($operator=="+" or $operator=="-" or $operator=="*" or $operator=="/"){ //checks for valid operator
            // does nothing
        }else{
            return "You must enter a string and two numbers.";
        }

        //checks for integers 
        if(is_null($int1)){return "Please enter valid integers.";}
        if(is_null($int2)){return "Please enter valid integers";}

        //calls operator method based on string input
        if($operator=="+"){$answer = $this->add($int1,$int2); return "The sum of ".$int1." and ".$int2." is ".$answer;}
        if($operator=="-"){$answer = $this->subtract($int1,$int2);return "The difference of ".$int1." and ".$int2." is ".$answer;}
        if($operator=="*"){$answer = $this->multiply($int1,$int2);return "The product of ".$int1." and ".$int2." is ".$answer;}
        if($operator=="/"){
            if($int2 == 0){return "Cannot Divide by Zero!";}
            $answer = $this->divide($int1,$int2);
            return "The division of ".$int1." and ".$int2." is ".$answer;
        }

    }

    public function add($int1,$int2){return $int1+$int2;}
    public function subtract($int1,$int2){return $int1-$int2;}
    public function multiply($int1,$int2){return $int1*$int2;}
    public function divide($int1,$int2){
        return $int1/$int2;
    }

}

?>


<!-- <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calculator</title> -->

        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- </head>
    <body>
        <p>test text</p>
    </body>

</html>  -->