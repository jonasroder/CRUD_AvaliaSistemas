<?php
require_once './Core/DB.php';

class VeiculosModel extends DB {

    public function __construct(){
        $db = new DB;
    }

    public function read($data)
    {
        $sql = "SELECT * FROM veiculos";
        
        if (isset($data['id'])) {
           $sql = "SELECT * FROM veiculos WHERE idveiculos=".$data['id'];
        }
        if (isset($data['busca'])) {
            $sql = "SELECT * FROM veiculos 
                        WHERE nome like '%".$data['busca']."%' 
                        || marca like '%".$data['busca']."%' 
                        || ano like '%".$data['busca']."%'
                        ";
            
        }
        //echo $sql;
        $busca = db::runSql($sql);
        
        if (isset($busca['dados'])) {
           return $busca['dados'];
        }
        return false;       
    }


    public function create($data)
    {
        $columns = implode("`,`", array_keys($data));
        $data = implode("','", $data);
        return db::runSql("insert into veiculos (`".$columns."`) values ('".$data."')") or die("Falha ao enviar dados, entre em contato com o admistrador do sistem ");
        
    }

    public function update($id, $data)
    {
        $set = [];
        foreach( $data as $key => $value ){
            array_push($set, $key."='".addslashes($value)."'");
        }
        return db::runSql("UPDATE veiculos SET " . implode(',', $set) . " WHERE idveiculos = " . $id)
            or die("Falha ao enviar dados, entre em contato com o admistrador do sistema" );
    }

    public function delete($id)
    {
        return db::runSql("DELETE FROM veiculos WHERE  idveiculos = " . $id) or die("Falha ao deletar dados, entre em contato com o admistrador do sistema" );
    }
    
}