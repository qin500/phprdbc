<h2>添加角色</h2>
<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" name="submit" value="添加角色">
</form>

<a href="./">返回首页</a>
<a href="RoleList.php">角色列表</a>


<?php
    require_once "./DB.php";
    if(isset($_POST['submit'])){
        $smtp=conn()->prepare("insert into role (name) values(:name)");
        $smtp->execute([":name"=>$_POST['name']]);
        echo "结果-----:" . $smtp->rowCount() ;
        var_dump($smtp->errorInfo());

    }
