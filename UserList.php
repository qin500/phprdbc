<?php
//获取所有的用户
require_once "./DB.php";
$smtp = conn()->prepare("select * from user");
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
    <title>所有用户</title>
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
        <caption>用户列表</caption>
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>角色</th>
            <th>权限列表</th>
        </tr>
        <?php foreach ($res as $k => $v) { ?>
            <tr>
                <td><?php echo $v['id']; ?></td>
                <td><?php echo $v['name']; ?></td>
                <td><a href="EditUser.php?uid=<?php echo $v['id']; ?>">编辑角色</a></td>
                <td><a href="ViewPermission.php?uid=<?php echo $v['id']; ?>">查看</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="./">返回首页</a>
</body>
</html>
