<?php


    require_once "DB.php";
    $role_id=$_GET['role_id'];
    //获取所有的权限
    $smtp=conn()->prepare("select * from permission");
    $smtp->execute();
    $res=$smtp->fetchAll();


    //获取当前角色拥有的权限
    $smtp=conn()->prepare("select * from role_permission where role_id=:role_id");
    $smtp->execute(["role_id"=>$role_id]);
    $role_res=$smtp->fetchAll();
    $role_p=array_column($role_res,"permission_id");

    //获取当前角色名称
    $smtp=conn()->prepare("select * from role where id=:id");
    $smtp->execute(["id"=>$role_id]);
    $role_curr=$smtp->fetch();

    if(isset($_POST['submit'])){
        $permissions=$_POST['permissions'] ?? [];

        //添加
        $add=array_diff($permissions,$role_p);

        //删除
        $del=array_diff($role_p,$permissions);
        print_r($del);
        $conn=conn()->prepare("insert into role_permission (role_id,permission_id) values(:role_id,:permission_id) ");
        foreach ($add as $item){
            $conn->execute([':role_id'=>$role_id,':permission_id'=>$item]);
        }
        $prepare=rtrim(str_repeat("?,",count($del)),",");
        $conn=conn()->prepare("delete from role_permission where role_id=? and permission_id in({$prepare})");
        array_unshift($del,$role_id);
        $conn->execute($del);
        header("location:" . "http://" . $_SERVER['SERVER_NAME']  .$_SERVER['REQUEST_URI'],true,301);
    }
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加权限</title>
</head>
<body>
<h1>你正在为角色<span style="color:red"><?php echo $role_curr['name']; ?></span>添加权限</h1>

<form action="" method="post">

<?php foreach($res as $k=>$v){ ?>
    <label><input name="permissions[]" type="checkbox" <?php echo (in_array($v['id'],$role_p)) ? 'checked':'' ?> value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></label><br>

<?php } ?>
    <input type="submit" name="submit" value="保存">
    <a href="RoleList.php">权限列表</a>
    <a href="index.php">首页</a>
</form>
</body>
</html>
