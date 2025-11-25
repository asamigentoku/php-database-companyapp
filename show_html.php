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
?>