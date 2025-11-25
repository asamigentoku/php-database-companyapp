<?php
    require_once("index.php");
    global $dbm;
    //もしdataが存在する場合
    if(isset($_POST["data"])){
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        if(isset($_POST["name"])){
            $name = $_POST["name"];
        }
        if(isset($_POST["industry"])){
            $industry = $_POST["industry"];
        }
        if(isset($_POST["location"])){
            $location = $_POST["location"];
        }
        if(isset($_POST["employees"])){
            $employees = $_POST["employees"];
        }
        if(isset($_POST["revenue"])){
            $revenue = $_POST["revenue"];
        }
        if(isset($_POST["old_id"])){
            $old_id = $_POST["old_id"];
        }
        //ここからcreate,update,deleteに応じて処理を変えていく
        if($_POST["data"]=="create"){
            if($dbm->insert_company($id,$name,$industry,$location,$employees,$revenue)==false){
                $error="DBエラー";
                //header("Location: student_input.php?error={$error}");
                //exit();
            }
        } else if($_POST["data"]=="update"){
            if($dbm->update_company($id,$name,$industry,$location,$employees,$revenue)==false){
                $error="DBエラー";
                //header("Location: student_input.php?error={$error}");
                //exit();
            }
        } else if($_POST["data"]=="delete"){
            //ここに削除の処理を実装
            $id=$_POST["id"];
            if($dbm->delete_company($id)==false){
                $error="DBエラー";
                //header("Location: student_delete.php?error={$error}&id={$id}");
                //exit();
            }
        }
    }

?>