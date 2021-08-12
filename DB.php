<?php

function conn()
{
    try {
        $conn = new PDO('mysql:host=localhost;port=3306;dbname=test;', 'root', '');
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $conn;
    } catch (Exception $e) {
        echo "<div style='color:red;font-size: 25px;font-weight: bold;'>错误文件:" . __FILE__ . nl2br("\r\n") .
             "错误 行: ". __LINE__ . nl2br("\r\n") .
             "错误消息:" . $e->getMessage() .  __LINE__ . nl2br("\r\n") .
            "数据库连接失败了,请重新配置数据库连接信息!!!" . "</div>";
        exit();
    }
}

