<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RBAC权限管理系统</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .app {
            width: 650px;
            margin: 20px auto;
            text-align: center;
        }

        table {
            width: 100%;
            margin: 20px auto;
            font-size: 22px;
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            border: 1px solid #ddd;
            text-align: center;
        }

        td a {
            text-decoration: none;
            color: #3f3f3f
        }

        td a:hover {
            color: red;
        }
    </style>
</head>
<body>
<div class="app">
    <h1>RBAC权限管理系统(演示版)</h1>
    <table>
        <tr>
            <td><a href="UserList.php">用户管理</a></td>
            <td><a href="AddUser.php">添加用户</a></td>
        </tr>
        <tr>
            <td><a href="RoleList.php">角色管理</a></td>
            <td><a href="AddRole.php">添加角色</a></td>
        </tr>
        <tr>
            <td><a href="PermissionList.php">权限管理</a></td>
            <td><a href="AddPermission.php">添加权限</a></td>
        </tr>
        <tr>
            <td colspan="2"><a href="http://www.qin500.com">用户权限查询</a></td>
        </tr>
    </table>
    <div>
        这里仅作演示,实际生产中,需要将用户ID替换为session,还需要判断用户是否有权限进行角色,权限操作等
    </div>
</div>
</body>
</html>