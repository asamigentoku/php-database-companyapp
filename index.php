<?php
    require_once("dbmanege.php");
    require_once("show_html.php");
    $dbm=new dbmanege();
    show_top();
    $member=$dbm->get_allcompany();
    show_company_list($member);
    show_input();
    show_bottom();
?>
