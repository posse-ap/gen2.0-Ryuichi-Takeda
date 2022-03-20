<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

require 'db-connect.php';
$prefecture_stmt=$pdo->prepare("SELECT * from big_questions WHERE id = $id");
$prefecture_stmt->execute();
$prefecture_data=$prefecture_stmt->fetchAll();


$questions_stmt=$pdo->prepare("SELECT * from questions WHERE big_question_id = $id");
$questions_stmt->execute();
$questions_data=$questions_stmt->fetchAll();


for($i = 0; $i < count($questions_data); $i++){
$choices_stmt_[$i]=$pdo->prepare(
    "SELECT region FROM questions left outer join choices on questions.question_id=choices.question_id 
    WHERE big_question_id=$id AND question_number=$i+1;
    ");
$choices_stmt_[$i]->execute();
$choices_data_[$i]=$choices_stmt_[$i]->fetchAll();

shuffle($choices_data_[$i]);
// print_r('<pre>');
// print_r($choices_data_[$i]);
// print_r('</pre>');
// echo $i;
}


// $valids_stmt=$pdo->prepare("SELECT * from questions WHERE big_question_id = $id");
// $questions_stmt->execute();
// $questions_data=$questions_stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>地名当てクイズ</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body id="body">
<div><?php echo $prefecture_data[0][1] ?>の難読地名クイズ</div>

</body>
</html>


<script>
    'use strict';
    const body = document.getElementById('body');
    let quizySet;
    <?php for ($i = 0; $i < count($questions_data); $i++) {?>
        quizySet = `<div class = container>` 
        +`<h1 class="question"><?php echo $i+1;?>.この地名はなんて読む？</h1>` 
        +`</div>`
        +`<img src = "<?php echo $questions_data[$i]['img']?>" class="image">`
        <?php for($j=0; $j < count($choices_data_[$i]); $j++) {?>
        + `<li onclick="colorChange()" class="choice choice<?php echo $i ?>" id="choice<?php echo $i ?>_<?php echo $j ?>"> <?php echo $choices_data_[$i][$j]['region'] ?></li>`
        <?php ;};?>
        body.insertAdjacentHTML('beforeend', quizySet);
            
    <?php };?>
    
    // const choices = document.querySelectorAll('.choice');
    // choices.addEventListener('click',function(){
        
        // });

    // document.getElementById(`choice${i}-0`).style.background = '#287dff';
    //     document.getElementById(`choice${i}-0`).style.color = 'white';
    //     document.getElementById(`incorrectResultBox${i}`).style.display = "block";
    //     document.getElementById(`incorrect${i}`).style.display = "block";
    //     document.getElementById(`choice${i}-2`).style.background = '#ff5128';
    //     document.getElementById(`choice${i}-2`).style.color = 'white';
</script>