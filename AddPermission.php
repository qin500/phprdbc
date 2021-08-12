<h2>添加权限</h2>
<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" name="submit" value="添加权限">
</form>

<a href="./">返回首页</a>
<a href="./PermissionList.php">权限列表</a>


<?php
    require_once "./DB.php";
    if(isset($_POST['submit'])){
        $smtp=conn()->prepare("insert into permission (name) values(:name)");
        $smtp->execute([":name"=>$_POST['name']]);
        echo "结果-----:" . $smtp->rowCount() ;
        var_dump($smtp->errorInfo());

    }
