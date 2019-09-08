<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
class Calculator {
    public $number1;
    public $number2;

    public function setNumber ($number1,$number2){
        $this->number1 = $number1;
        $this->number2 = $number2;
    }
    public function addition(){
        return $this->number1 + $this->number2;
    }
    public function subtract(){
        return $this->number1 - $this->number2;
    }
    public function multiply (){
        return $this->number1 * $this->number2;
    }
    public function divide (){
        return $this->number1 / $this->number2;
    }
}
function calculate (){
    global $calculate, $operation;
    switch ($operation){
        case add:
            return $calculate->addition();
            break;
        case sub:
            return $calculate->subtract();
            break;
        case mul:
            return $calculate->multiply();
            break;
        case div:
            return$calculate->divide();
            break;
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $number1 = $_POST['num1'];
    $calculate = $_POST['calculate'];
    $number2 = $_POST['num2'];
}

$calculate = new Calculator();

?>
<body>
<form method="post">
    <fieldset>
        <legend>Calculator</legend>
        First operand:<input type="number" name="num1" placeholder="nhap so">
        Operator:<select name="calcu">
            <option value="add">addition</option>
            <option value="sub">subtract</option>
            <option value="mul">multiply</option>
            <option value="div">divide</option>
        </select>
        Second operand:<input type="number" name="num2" placeholder="nhap so">
        <button type="submit" name="result" value="Calculate">Calculate</button>
    </fieldset>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $number1 = $_POST['num1'];
    $number2 = $_POST['num2'];
    $operation = $_POST['calcu'];
    $result = $_POST['result'];
    $calculate->setNumber($number1, $number2);
    if ($result = $_POST['result']) {
        echo "<h1>Result: </h1>" . $number1 . " + " . $number2 . " = " . calculate();
    }
}

?>


</body>
</html>
