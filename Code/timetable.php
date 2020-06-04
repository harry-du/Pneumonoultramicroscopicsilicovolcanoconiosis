<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        @import "Layout.css";
    </style>
</head>

<body>
    <br><br>
    <header>
        <h1 align=center>我的課表</h1>
    </header>
    <br>
    <section class="container">
        <form action="timetable.php" method="post">
            <table class="table-danger table-bordered" width="1000" id="qwe">
                <thead>
                    <tr align=center>
                        <td>選課代號</td>
                        <td>課程名稱</td>
                        <td>學分數</td>
                        <td>必選修</td>
                        <td>授課教師</td>
                        <td>開課班級</td>
                        <td>星期</td>
                        <td>時間</td>
                    </tr>
                    <tr align=center>
                        <td><?php $c_id ?></td>
                        <td><?php $c_name ?></td>
                        <td><?php $credit ?></td>
                        <td><?php $RorE ?></td>
                        <td><?php $t_id ?></td>
                        <td><?php $class ?></td>
                        <td><?php $week ?></td>
                        <td><?php $time ?></td>
                        <td align=center><input type="submit" name="submit" value="退選">
                                         <input type='hidden' value='$c_id'/>
                        </td>
                    </tr>
                </thead>
            </table>
        </form>
    </section>
</body>

</html>


<?php
        include('connect.php');
        $sql = "SELECT course.c_id, student.s_id FROM course INNER JOIN student ON (course.class = student.class) AND (course.RorE = 'M')";
                $result = mysql_query($sql);
                $num = mysql_num_rows($result);
                for( $i=1; $i<=$num ; $i++)
                {
                    $row = mysql_fetch_row($result);
                    $c_id = $row[0];
                    $c_name = $row[1];
                    $credit = $row[2];
                    $RorE = $row[3];
                    $t_id = $row[4];
                    $class = $row[5];
                    $week = $row[6];
                    $time = $row[7];
                }

                $submit = !empty($_GET["submit"]) ? $_GET["submit"] : null;

                $msg = '';
                if( $submit == '退選')
                {
                    $sql = "DELETE FROM 'registraion' WHERE 'c_id'=$c_id";
                    $msg = "退選成功";
                }
                else
                {
                    echo '不正常操作';
                    return;
                }
                mysql_query($sql) or die('執行錯誤');

                echo $msg;

                mysql_close();
?>