<?php

require_once "DB.php";
$uid = $_GET['uid'];
//当前用户
$smpt = conn()->prepare("select * from user where id=:id");
$smpt->execute([':id' => $uid]);
$user = $smpt->fetch();

//查询该用户所有的角色
$smpt = conn()->prepare(" select * from user_role ,role where user_role.uid=:uid and user_role.role_id = role.id");
$smpt->execute([':uid' => $uid]);
$userhasrole = $smpt->fetchAll();
$userhasrole_sign = array_column($userhasrole, "name");
$userhasrole_id = array_column($userhasrole, "id");


//查询该用户所有的权限
$prepare = rtrim(str_pad('', count($userhasrole_sign) * 2, "?,", STR_PAD_RIGHT), ",");
$sql = " select distinct permission.id,permission.name from role_permission ,permission where role_permission.role_id in($prepare) and role_permission.permission_id = permission.id";
$smpt = conn()->prepare($sql);
$smpt->execute($userhasrole_id);
$userhasp = $smpt->fetchAll();
$all_p = array_unique(array_column($userhasp, "name"));

//查询该用户所有的权限
$prepare = rtrim(str_pad('', count($userhasrole_sign) * 2, "?,", STR_PAD_RIGHT), ",");
$sql = "select  * from user " .
    "left join user_role on  user.id=:uid   " .
    "right join role_permission on user_role.role_id =role_permission.role_id " .
    "left join permission on permission.id=role_permission.permission_id ";

//$sql="select  * from user left join user_role on  user.id=:uid where user_role.uid is not null  " ;
$smpt = conn()->prepare($sql);
$smpt->execute([':uid' => $uid]);
$u = $smpt->fetchAll();

//        print_r($u);
$ru=array_filter(array_unique(array_column($u, "name")));
print_r($ru);
echo "总数:" . count($ru);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>权限查看</title>
</head>
<body>
<h2>当前用户:<span style="color:red"><?php echo $user['name']; ?></span>拥有的角色</h2>
<?php foreach ($userhasrole as $item): ?>
    <p><?php echo $item['name']; ?></p>
<?php endforeach; ?>
<h2>当前用户:<span style="color:red"><?php echo $user['name']; ?></span>拥有的权限列表</h2>
<?php foreach ($all_p as $item): ?>
    <p><?php echo $item; ?></p>
<?php endforeach; ?>


</body>
</html>
