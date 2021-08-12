<?php
    require_once "DB.php";
    $uid=$_GET['uid'];
    //当前用户
    $smpt=conn()->prepare("select * from user where id=:id");
    $smpt->execute([':id'=>$uid]);
    $user=$smpt->fetch();

    //系统所有的角色
    $smpt=conn()->prepare("select * from role");
    $smpt->execute();
    $roles=$smpt->fetchAll();

    //查询当前用户拥有的角色
    $smpt=conn()->prepare("select role_id from user_role where uid=:uid");
    $smpt->execute([':uid'=>$uid]);
    $userhasrole_model=$smpt->fetchAll();
    $userhasrole=array_column($userhasrole_model,"role_id");


    if(isset($_POST['submit'])){
        $roles_v=$_POST['roles'] ?? [];

        //需要添加的角色
        $add=array_diff($roles_v,$userhasrole);

        //需要删除的呢
        $del=array_diff($userhasrole,$roles_v);

        //执行添加
        $smpt=conn()->prepare("insert into user_role (uid,role_id) values(:uid,:role_id)");
        foreach ($add as $v){
            $smpt->execute([':uid'=>$uid,':role_id'=>$v]);
        }

        //执行添加
        $smpt=conn()->prepare("delete from user_role where uid=:uid and role_id=:role_id");
        foreach ($del as $v){
            $smpt->execute([':uid'=>$uid,':role_id'=>$v]);
        }
        header("location:" . "http://" . $_SERVER['SERVER_NAME']  .$_SERVER['REQUEST_URI']);

    }
   ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>角色修改</title>
</head>
<body>
<h2>请选择你要为用户:<span style="color:red"><?php echo $user['name']; ?></span>分配的角色</h2>
<form method="post">
<?php foreach ($roles as $k=>$v): ?>
<label><input type="checkbox" name="roles[]" <?php echo (in_array($v['id'],$userhasrole) ? "checked" : "")  ?> value="<?php echo $v['id'];  ?>"><?php echo $v['name'];  ?></label><br>
<?php endforeach; ?>
    <input type="submit" name="submit" value="保存">
</form>
<a href="./">返回首页</a>
<a href="UserList.php">用户列表</a>
</body>
</html>