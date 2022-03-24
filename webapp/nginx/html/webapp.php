<!-- https://docs.google.com/spreadsheets/d/1GodKhaz4AvDkgtl5TgtEDUB7K_M9nAx3cQDO2cJf-Ts/edit#gid=850277845 -->
<!-- https://drive.google.com/drive/folders/1V1w1TFbroSXnTE2wkeMBQLru8g60id4q -->
<!-- https://photopizza.design/css_loading/ -->


<!-- https://docs.google.com/spreadsheets/d/1L5tkBYT9LpBVfIAJqd-zGNBD-z4YdevLbYABwBpyCrw/edit#gid=1375928132 -->
<?php
require 'db-connect.php';

if (isset($_GET['user'])) {
  $user_id = $_GET['user'];
}


$today = date('Y-m-d');
$today_year = explode('-', $today)[0];
$today_month = explode('-', $today)[1];
$today_date = explode('-', $today)[2];

$user_name_stmt = $pdo->prepare("SELECT user_name from users WHERE id = ?");
$user_name_stmt->bindValue(1, $user_id);
$user_name_stmt->execute();
$user_name_data = $user_name_stmt->fetchAll();
// print_r($user_name_data);
// echo date('Y', strtotime(2022-03-12));
$today_hour_stmt = $pdo->prepare("SELECT sum(hour) from dates_posts WHERE user_id = ?
and day = ?
");
$today_hour_stmt->bindValue(1, $user_id);
$today_hour_stmt->bindValue(2, $today);
$today_hour_stmt->execute();
$today_hour_data = $today_hour_stmt->fetchAll();
if ($today_hour_data[0][0] == null) {
  $today_hour_data[0][0] = 0;
}
// print_r($today_hour_data);
$month_hour_stmt = $pdo->prepare("SELECT sum(hour) from dates_posts WHERE user_id = ?
and date('Y', strtotime(day)) = DATE_FORMAT(now(), '%Y') 
-- DATE_FORMAT(day, '%Y%m') = DATE_FORMAT(now(), '%Y%m') 
");
$month_hour_stmt->bindValue(1, $user_id);
$month_hour_stmt->execute();
$month_hour_data = $month_hour_stmt->fetchAll();
$month_hour_stmt = $pdo->prepare("SELECT sum(hour) from dates_posts_mix WHERE user_id = ?
-- and date('Y', strtotime(day)) = DATE_FORMAT(now(), '%Y') 
and DATE_FORMAT(day, '%Y%m') = DATE_FORMAT(now(), '%Y%m') 
");
$month_hour_stmt->bindValue(1, $user_id);
$month_hour_stmt->execute();
$month_hour_data = $month_hour_stmt->fetchAll();
if($month_hour_data[0][0] == null){
  $month_hour_data[0][0]=0;
}

$total_hour_stmt = $pdo->prepare("SELECT sum(hour) from posts WHERE user_id = ?
");
$total_hour_stmt->bindValue(1, $user_id);
$total_hour_stmt->execute();
$total_hour_data = $total_hour_stmt->fetchAll();

$day_hour_stmt=$pdo->prepare("SELECT sum(hour) from mix WHERE user_id = ?
and day = ?
");
$day_hour_stmt->bindValue(1, $user_id);
$day_hour_stmt->bindValue(2,$today);
$day_hour_stmt->execute();
$day_hour_data=$day_hour_stmt->fetchAll();
if($day_hour_data[0][0] == null){
  $day_hour_data[0][0]=0;
}

for($i=1; $i <= 31;$i++){
  $days_hour_stmt_[$i] = $pdo->prepare("SELECT sum(hour) from dates_posts_mix WHERE user_id = ?
  and day=?
  ");
  $days_hour_stmt_[$i]->bindValue(1, $user_id);
  $days_hour_stmt_[$i]->bindValue(2,"$today_year-$today_month-[$i]");
  $days_hour_stmt_[$i]->execute();
  $days_hour_data_[$i] = $days_hour_stmt_[$i]->fetchAll();
  if ($days_hour_data_[$i][0]['sum(hour)'] == null) {
    $days_hour_data_[$i][0]['sum(hour)'] = 0;
  }
  }




$language_length_stmt = $pdo->prepare("SELECT count(language) from languages
-- WHERE post_id = $i
-- WHERE user_id = ?
");
$language_length_stmt->bindValue(1, $user_id);
$language_length_stmt->execute();
$language_length_data = $language_length_stmt->fetchAll();
// print_r($language_number_data);
// echo $language_length_data[0]['count(language)'];

$content_length_stmt = $pdo->prepare("SELECT count(content) from contents
-- WHERE post_id = $i
-- WHERE user_id = ?
");
$content_length_stmt->bindValue(1, $user_id);
$content_length_stmt->execute();
$content_length_data = $content_length_stmt->fetchAll();
echo $content_length_data[0]['count(content)'];


$post_length_stmt = $pdo->prepare("SELECT count(id) from posts
-- WHERE post_id = $i
-- WHERE user_id = ?
");
$post_length_stmt->bindValue(1, $user_id);
$post_length_stmt->execute();
$post_length_data = $post_length_stmt->fetchAll();
// print_r($post_length_data);
  


for($j = 1; $j <= $language_length_data[0]['count(language)'];$j++){
  $languages_hour_[$j]=0;
for($i = 1; $i <= $post_length_data[0]['count(id)'];$i++){
$languages_count_stmt_[$i] = $pdo->prepare("SELECT count(language) from posts_languages_mix
WHERE post_id = $i
AND user_id = ?
");
$languages_count_stmt_[$i]->bindValue(1, $user_id);
$languages_count_stmt_[$i]->execute();
$languages_count_data_[$i] = $languages_count_stmt_[$i]->fetchAll();
if ($languages_count_data_[$i][0][0] == 0) {
  $languages_count_data_[$i][0][0] = 1;
}
$languages_hour_stmt_[$i] = $pdo->prepare("SELECT sum(hour) from posts_languages_mix
WHERE post_id = $i
AND language_id = $j
AND user_id = ?
");
$languages_hour_stmt_[$i]->bindValue(1, $user_id);
$languages_hour_stmt_[$i]->execute();
$languages_hour_data_[$i] = $languages_hour_stmt_[$i]->fetchAll();
if ($languages_hour_data_[$i][0]['sum(hour)'] == null) {
  $languages_hour_data_[$i][0]['sum(hour)'] = 0;
}
$languages_study_hour[$i] = $languages_hour_data_[$i][0]['sum(hour)']/$languages_count_data_[$i][0][0];
$languages_hour_[$j]=$languages_hour_data_[$i][0]['sum(hour)']/$languages_count_data_[$i][0][0]+$languages_hour_[$j];
}
}

for($j = 1; $j <=  $content_length_data[0]['count(content)'];$j++){
  $contents_hour_[$j]=0;
for($i = 1; $i <= $post_length_data[0]['count(id)'];$i++){
$contents_count_stmt_[$i] = $pdo->prepare("SELECT count(content) from posts_contents_mix
WHERE post_id = $i
AND user_id = ?
");
$contents_count_stmt_[$i]->bindValue(1, $user_id);
$contents_count_stmt_[$i]->execute();
$contents_count_data_[$i] = $contents_count_stmt_[$i]->fetchAll();
if ($contents_count_data_[$i][0][0] == 0) {
  $contents_count_data_[$i][0][0] = 1;
}
$contents_hour_stmt_[$i] = $pdo->prepare("SELECT sum(hour) from posts_contents_mix
WHERE post_id = $i
AND content_id = $j
AND user_id = ?
");
$contents_hour_stmt_[$i]->bindValue(1, $user_id);
$contents_hour_stmt_[$i]->execute();
$contents_hour_data_[$i] = $contents_hour_stmt_[$i]->fetchAll();
if ($contents_hour_data_[$i][0]['sum(hour)'] == null) {
  $contents_hour_data_[$i][0]['sum(hour)'] = 0;
}
$contents_study_hour[$i] = $contents_hour_data_[$i][0]['sum(hour)']/$contents_count_data_[$i][0][0];
$contents_hour_[$j]=$contents_hour_data_[$i][0]['sum(hour)']/$contents_count_data_[$i][0][0]+$contents_hour_[$j];
}
}


$language_color_stmt = $pdo->prepare("SELECT language_color from languages");
$language_color_stmt->execute();
// $language_stmt->bindValue(1, $today);
$language_color_data = $language_color_stmt->fetchAll();
// for($j=0;$j<=7;$j++){
// print('<pre>');
// print_r($language_color_data[$j]['language_color']);
// print('</pre>');
// }


$content_color_stmt = $pdo->prepare("SELECT content_color from contents");
$content_color_stmt->execute();
// $language_stmt->bindValue(1, $today);
$content_color_data = $content_color_stmt->fetchAll();
// for($j=0;$j<=7;$j++){
// print('<pre>');
// print_r($content_color_data[$j]['content_color']);
// print('</pre>');
// }

?> 




<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="webapp" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
</head>

<body>

  <!-- /.header ここから -->
<?php require 'header.php'; ?>
  <!-- /.header ここまで -->

  <!-- /.graph ここから -->
  <?php require 'study_hours.php';?>
  <?php require 'bar_chart.php'; ?>
  <?php require 'pie_chart.php'; ?>

  <!-- /.graph ここまで -->
  <div class="date"><?php echo $today_year ?>年<?php echo $today_month ?>月<?php echo $today_date ?>日</div>

  <!-- /.modal ここから -->

<?php require('modal.php');?>



  <!-- /.modal ここまで -->

  <script src="js/script.js"></script>
  <!-- <script src="js/bar_chart.js"></script>
  <script src="js/doughnut_chart.js"></script>
  <script src="js/doughnut_chart2.js"></script> -->
</body>

</html>