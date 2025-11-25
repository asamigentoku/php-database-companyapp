<?php
    function show_top($heading="企業一覧"){
        echo <<<COMPANY_LIST
            <html>
                <head>
                    <title>企業リスト</title>
                </head>
                <body>
                    <h1>{$heading}</h1>
            COMPANY_LIST;
    }
    function show_bottom($return_top=false){
        //現在のfalseの応じてHTMLを分けることができる
        if($return_top==true) {
            echo <<<BACK_TOP
                    <a href="index.php">企業一覧に戻る</a>
                BACK_TOP;
        }
        echo <<<BOTTOM
                </body>
            </html>
            BOTTOM;
    }
    function show_company_list($member){
        echo <<<COMPANY_LIST
        <table border="1" style="border-collapse:collapse">
            <tr>
                <th>学生番号</th><th width="200px">名前</th><th>学年</th><th>場所</th><th>従業員数</th><th>売り上げ</th>
            </tr>
        COMPANY_LIST;
        foreach($member as $loop){
            echo <<<END
                <tr align="center">
                    <td>{$loop['id']}</td>
                    <td>{$loop["name"]}</td>
                    <td>{$loop["industry"]}</td>    
                    <td>{$loop["location"]}</td>     
                    <td>{$loop["employees"]}</td>  
                    <td>{$loop["revenue"]}</td>   
                </tr>
            END;
        }
        echo <<<TABLE_BOTTOM
        </table>
        <br>
        TABLE_BOTTOM;
    }

    function show_edit_input($id,$name,$industry,$location,$employees,$revenue,$old_id,$data,$button){
        echo <<<FORM_list
        <form action="post_data.php" method="post">
            <p>ID番号</p>
            <input type="text" name="id" placeholder="例)1001" value="{$id}">
            <p>企業名</p>
            <input type="text" name="name" placeholder="例)山田太郎" value="{$name}">
            <p>業界</p>
            <input type="text" name="industry" placeholder="例)飲食" value="{$industry}">
            <p>場所</p>
            <input type="text" name="location" placeholder="例)愛知県" value="{$location}">
            <p>従業員数</p>
            <input type="text" name="employees" placeholder="例)1333223" value="{$employees}">
            <p>売上</p>
            <input type="text" name="revenue" placeholder="例)23994844" value="{$revenue}">
            <input type="hidden" name="old_id" value="{$old_id}"/>
            <input type="hidden" name="data" value="{$data}"/>
            <input type="submit" value="{$button}">
            </form>
        FORM_list;
    }

    function show_input(){
        show_edit_input("","","","","","","","create","登録");
    }

    function show_update($id,$name,$industry,$location,$employees,$revenue,$old_id){
        show_edit_input($id,$name,$industry,$location,$employees,$revenue,$old_id,"update","更新");
    }

    function show_delete($member){
        if($member!=null){
            show_student($member);
        }
        echo <<<DELETE
                <form action="post_data.php" method="post">
                    <p>この情報を削除しますか?</p>
                    
                    <input type="hidden" name="id" value="{$member['id']}"/>
                    <input type="hidden" name="data" value="delete"/>
                    <input type="submit" value="削除">
                </form>
            DELETE;
    }
?>