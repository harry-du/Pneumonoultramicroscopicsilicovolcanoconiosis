<!DOCTYPE html>
<?php
    session_start();
    //要用s_id請打$_SESSION['s_id']
?>
<html>

<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style type = "text/css">
        @import "Layout.css";
    </style>
    <script>
        department = new Array();
        department[0] = [""];
        department[1] = ["企管一甲", "企管一乙", "企管二甲", "企管二乙", "企管三甲", "企管三乙", "企管四甲", "企管四乙", "企管碩一", "企管碩二"]; //企管系
        department[2] = ["通識－社會整合(SB)", "通識－社會", "通識－社會(夜)", "通識－人文", "通識－人文(夜)", "通識－自然", "通識－自然(夜)", "通識－統合", "通識－統合(夜)"];	//通識課
        department[3] = ["資訊一甲", "資訊一乙", "資訊一丙", "資訊二甲", "資訊二乙", "資訊二丙", "資訊二丁", "資訊三甲", "資訊三乙", "資訊三丙", "資訊三丁", "資訊碩一", "資訊博一", "資訊博二", "電腦系統學程資訊三", "軟體工程學程資訊三", "網路與資安學程資訊三", "資訊跨域學程資訊三"];	//資訊系
        function renew(index) {
            for (var i = 0; i < department[index].length; i++)
                document.myForm.member.options[i] = new Option(department[index][i], department[index][i]);	// 設定新選項
            document.myForm.member.length = department[index].length;	// 刪除多餘的選項
        }
    </script>
</head>

<body>
    <br><br>
    <header>
        <h1 align = center>選課系統</h1>
    </header>
    <br>
    <div class = "row justify-content-end" style = "margin-right:15%">

        <label class = "form-inline">
            <form action = "timetable.php" method = "POST">
                <input class = "btn btn-outline-danger" type = "submit" value = "我的課表">
            </form>
            <form action = "LoginWithHTML.php" method = "post">
                <input class = "btn btn-outline-secondary" type = "submit" value = "Logout">
            </form>
        </label>

    </div>
    <form name = "myForm" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" class = "container">
        系別：
        <select size=1 onClick="renew(this.selectedIndex);" class="btn btn-outline-info dropdown-toggle">
            <option value = "">請選擇...</option>
            <option value = "Department of Business Management">企業管理學系
            <option value = "General Education">通識
            <option value = "Department of Information Engineering">資訊工程學系
        </select>

        班級：
        <select name = "member" size = 1 class = "btn btn-outline-info dropdown-toggle">
            <option value = "">
        </select>
        <input type = "submit" value = "Search" class = "btn btn-outline-success">
    </form>
    <br>
    <section class = 'container'>
    <?php
    $i = 0;
    $arrcid = [];
    $arrcname = [];
    $arrcredit = [];
    $arrtid = [];
    $arrRorE = [];
    $arrcdept = [];
    $arrclass = [];
    $arrnow = [];
    $arrmax = []; 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once('connect.php');
        $member = $_POST['member'];
        $sql = "Select * from course WHERE class='$member'";
        $result = mysqli_query($con,$sql);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                    array_push($arrcid,$row['c_id']);
                    array_push($arrcname,$row['c_name']);
                    array_push($arrcredit,$row['credit']);
                    array_push($arrtid,$row['t_id']);
                    array_push($arrRorE,$row['RorE']);
                    array_push($arrcdept,$row['dept_name']);
                    array_push($arrclass,$row['class']);
                    array_push($arrnow,$row['now_member']);
                    array_push($arrmax,$row['max_member']);
                }
        }else{
            die("No data");
        }
        //tid轉tname
        $tname_num = 0;
        $arrtname = [];
        for($tname_num=0;$tname_num<count($arrtid);$tname_num++){
            $sql = "Select * from teacher WHERE t_id='$arrtid[$tname_num]'";
            $result = mysqli_query($con,$sql);
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                array_push($arrtname,$row['t_name']);       
                }
            }
        }
    } 

        echo "<table class = 'table-danger table-bordered' width = '1000'>";
            echo "<thead>";
            //開頭
                echo "<tr align = center>";
                echo "    <th>選課代號</th>";
                echo "    <th>課程名稱</th>";
                echo "    <th>學分數</th>";
                echo "    <th>上課時間</th>";
                echo "    <th>必選修</th>";
                echo "    <th>授課教師</th>";
                echo "    <th>開課班級</th>";
                echo "    <th>已收授人數/開課人數</th>";
                echo "    <th>詳情</th>";
                echo "</tr>";
            //正式搜尋結果
            $i = 0;
            for($i = 0;$i<count($arrcid);$i++){
                //表單開始
                echo "<tr align = center>";
                    echo "    <th>$arrcid[$i]</th>";
                    echo "    <th>$arrcname[$i]</th>";
                    echo "    <th>$arrcredit[$i]</th>";

                    //ctime
                    echo "    <th>";
                        $sql = "Select * from time WHERE c_id='$arrcid[$i]'";
                        $result = mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo ($row[1].($row[2]));
                        }
                    echo "</th>";
                    
                    echo "    <th>$arrRorE[$i]</th>";
                    echo "    <th>$arrtname[$i]</th>";
                    echo "    <th>$arrclass[$i]</th>";
                    echo "    <th>$arrnow[$i]/$arrmax[$i]</th>";

                    //c詳情
                    echo "    <th>";
                    echo " <form method='post' action='details.php'>";
                    echo "     <input type='hidden' value='$arrcid[$i]' name='c_id'>";
                    echo "     <input type='hidden' value='$arrclass[$i]' name='c_class'>";
                    echo "     <input type='submit' value='查詢'>";
                    echo " </form>";
                    echo "</th>";
                    //表單結束
                    echo "</tr>";
            }
            echo "</thead>";

        echo "</table>";
    echo "</section>";
    ?>
    <br><br>
    <footer>
        <ul align = "center">
            <h>注意事項</h>
            <li>1.學分上限為30</li>
            <li>2.學分下限為9</li>
            <li>3.深腕專題demo的時間</li>
        </ul>
    </footer>
</body>

</html>