<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // single line comment
    #single line comment
    /*
etertertert
     ertetertert
     werwerw
     wer
     */
    $person = "juan";
    $num1 = 1;
    $sample = true;

    // echo "Hello";

    $myArray = array("sample", 12, true, "21");// $myArray = ["12", "juan", 21]

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");//Associative Array

    // echo $age['Peter']."<br>";
    // echo $age['Ben']."<br>";
    // echo $age['Joe']."<br>";

    foreach($age as $name => $value){
        echo "Key = ".$name.", Value = ".$value."<br>";
    }
    // or just get the value alone
    foreach($age as $name ){
        echo $name."<br>";
    }

    ?>
</body>
</html>