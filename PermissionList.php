<?php
//获取所有的角色
require_once "./DB.php";
$smtp = conn()->prepare("select * from permission");
$smtp->execute();
$res = $smtp->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>所有权限</title>
    <style>
        table {
            border: 1px solid #ddd;
            width: 600px;
            border-collapse: collapse;
        }
        th,td{
            border: 1px solid #ddd;
        }

    </style>
</head>
<body>
    <table>
        <caption>权限列表</caption>
        <tr>
            <th>id</th>
            <th>名称</th>
            <th>操作</th>
        </tr>
        <?php foreach ($res as $k => $v) { ?>
            <tr>
                <td><?php echo $v['id']; ?></td>
                <td><?php echo $v['name']; ?></td>
                <td>删除</td>
            </tr>
        <?php } ?>
    </table>
    <a href="./">返回首页</a>
    <a href="./AddPermission.php">添加权限</a>
</body>
</html>
