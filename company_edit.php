<?php
    require_once("dbmanege.php");
    require_once("show_html.php");
    $dbm=new dbmanege();
    $id=$_GET["id"];
    $member=$dbm->get_company($id);
    show_top("選択情報");
    show_company($member);
    show_delete($member);
    show_bottom(true);
?>