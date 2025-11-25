<?php
class dbmanege{
    private $access_info;
    private $user;
    private $password;
    private $db=null;

    function __construct(){
        //ここではMAMPを利用したデータベースを利用する
        $this->access_info="mysql:host=localhost;dbname=school";
        $this->user="root";
        $this->password="root";
    }

    private function connect(){
        $this->db=new PDO($this->access_info,$this->user,$this->password);
    }
    private function disconnect(){
        $this->db=null;
    }

    //一覧を表示
    function get_allcompany(){
        try{
            $this->connect();
            $stmt=$this->db->prepare("SELECT * FROM companies");
            $res=$stmt->execute();
            if($res){
                $info=$stmt->fetchALL();
                $this->disconnect();
                return $info;
            }
        } catch (PDOException $e) {
            $this->disconnect();
            return null;
        }
        $this->disconnect();
        return null;
    }
    //特定のidの会社を取得
    function get_company($id){
        try{
            $this->connect();
            $stmt=$this->db->prepare("SELECT * FROM companies WHERE id=?");
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $res=$stmt->execute();
            if($res){
                $info=$stmt->fetchALL();
                $this->disconnect();
                if(count($info)==0){
                    return null;
                }
                return $info[0];
            }
        } catch (PDOException $e) {
            $this->disconnect();
            return null;
        }
        $this->disconnect();
        return null;
    }

    //特定のIDの会社が存在するか
    function if_id_exists($id){
        if($this->get_company($id)!==null){
            return true;
        }
        return false;
    }

    //データ挿入
    function insert_company($id,$name,$industry,$location,$employees,$revenue){
        try{
            $this->connect();
            $stmt=$this->db->prepare("INSERT INTO companies VALUES(?,?,?,?,?,?);");
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $stmt->bindParam(2,$name,PDO::PARAM_STR);
            $stmt->bindParam(3,$industry,PDO::PARAM_STR);
            $stmt->bindParam(4,$location,PDO::PARAM_STR);
            $stmt->bindParam(5,$employees,PDO::PARAM_INT);
            $stmt->bindParam(6,$revenue,PDO::PARAM_INT);
            $res=$stmt->execute();
            $this->disconnect();
            return true;
        } catch (PDOException $e) {
            $this->disconnect();
            return false;
        }
        $this->disconnect();
        return false;
    }

    //データを削除
    function delete_company($id){
        try{
            $this->connect();
            $stmt=$this->db->prepare("DELETE FROM companies WHERE id=?;");
            //stmtにIDを代入をする
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $res=$stmt->execute();
            $this->disconnect();
            return true;
        } catch (PDOException $e) {
            $this->disconnect();
            return false;
        }
        $this->disconnect();
        return false;
    }
    //更新
    function update_company($id,$name,$industry,$location,$employees,$revenue){
        try{
            $this->connect();
            $stmt=$this->db->prepare("UPDATE companies SET id=?,name=?,industry=?,$location=?,$employees=?,$revenue=? WHERE id=?;");
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $stmt->bindParam(2,$name,PDO::PARAM_STR);
            $stmt->bindParam(3,$industry,PDO::PARAM_STR);
            $stmt->bindParam(4,$location,PDO::PARAM_STR);
            $stmt->bindParam(5,$employees,PDO::PARAM_INT);
            $stmt->bindParam(6,$revenue,PDO::PARAM_INT);
            $res=$stmt->execute();
            $this->disconnect();
            return true;
        } catch (PDOException $e) {
            $this->disconnect();
            return false;
        }
        $this->disconnect();
        return false;
    }
}
?>