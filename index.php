<?php
if(!empty($_GET)){ //判斷$_GET是否為空,如果不為空表示為GET的方式傳送
    $height=$_GET['height'];
    $weight=$_GET['weight'];
}else{ //若GET為空則預設值都為1避免除數為0而產生錯誤
    $height=1;
    $weight=1;
};
$result = round($weight / (($height/100) * ($height/100)),2); //計算BMI指數再四捨五入取小數點2位
switch ($result) {  //依條件判定BMI的區間
    case ($result<15):
            $level = "<p class='p1'>非常嚴重的體重不足</p>";
            $a = "p1";
        break;
    case ($result >= 15 && $result < 16):
            $level = "<p class='p2'>嚴重的體重不足</p>";
            $a = "p2";
        break;
    case ($result >= 16 && $result < 18.5):
            $level = "<p class='p3'>體重不足</p>";
            $a = "p3";
        break;
    case ($result >= 18.5 && $result < 25):
            $level = "<p class='p4'>體重正常(健康體重)</p>";
            $a = "p4";
        break;
    case ($result >= 25 && $result < 30):
            $level = "<p class='p5'>體重過重</p>";
            $a = "p5";
        break;
    case ($result >= 30 && $result < 35):
            $level = "<p class='p6'>輕度肥胖(一級肥胖)</p>";
            $a = "p6";
        break;
    case ($result >= 35 && $result < 40):
            $level = "<p class='p7'>重度肥胖(二級肥胖)</p>";
            $a = "p7";
        break;
    case ($result >= 40):
            $level = "<p class='p8'>極重度肥胖(三級肥胖)</p>";
            $a = "p8";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI計算</title>
    <link rel="stylesheet" href="./resource/style.css">
</head>
<body>
    <table><!-- BMI區間表格內容 --> 
        <tr>
            <th colspan="2">身體質量指數(kg/m2)</th>
            <th>腰圍(cm)</th>
        </tr>
        <tr>
            <td>非常嚴重的體重不足</td>
            <td>BMI < 15</td>
            <td rowspan="8">男性 ≧ 90 公分<br><br>女性 ≧ 80 公分</td>
        </tr>
        <tr>
            <td>嚴重的體重不足</td>
            <td>15 ≦ BMI < 16</td>
        </tr>
        <tr>
            <td>體重不足</td>
            <td>16 ≦ BMI < 18.5</td>
        </tr>
        <tr>
            <td>體重正常（健康體重）</td>
            <td>18.5 ≦ BMI < 25</td>
        </tr>
        <tr>
            <td>體重過重</td>
            <td>25 ≦ BMI < 30</td>
        </tr>
        <tr>
            <td>輕度肥胖（一級肥胖）</td>
            <td>30 ≦ BMI < 35</td>
        </tr>
        <tr>
            <td>重度肥胖（二級肥胖）</td>
            <td>35 ≦ BMI < 40</td>
        </tr>
        <tr>
            <td>極重度肥胖（三級肥胖）</td>
            <td>BMI ≧ 40</td>
        </tr>
</table>

<div class="bmi">
<?php
if(empty($_GET)){ //若GET為空，顯示輸入欄位供輸入
?>
<form action="index.php" method="get">
    <h2>
    身體質量指數 (BMI) 計算器
    </h2>
    <p style="display: block;text-align:left">
    身體質量指數（Body Mass Index, BMI）世界衛生組織建議衡量肥胖程度的指標，BMI 值計算公式是以體重 (公斤) 除以身高 (公尺) 的平方，來算算看自己的 BMI 是否標準吧！
    </p>
    <label for="height">身高(cm):
        <input type="number" name="height" id="height" min=50 max=350>
    </label>
    <br>
    <br>
    <br>
    <label for="weight">體重(kg) :
        <input type="number" name="weight" id="weight" min=1 max=999>
    </label>
    <br>
    <br>
    <button type="submit" id="submit">立即計算</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="reset" id="reset">清除重填</button>
</form>
<?php
}else{ //若有GET資料則顯示計算結果
?>
    <h1 style="text-align:center">
    您的BMI值為 : <p class=<?=$a?>><?=$result;?></p>
    </h1>
    <h2 style="text-align:center">判定結果為 : <?=$level;?></h2>
    <div style="text-align:center">
    <a href="index.php"><button id="return">回到BMI計算</button></a>
    </div> 
<?php
}
?>  
</div>
</body>
</html>