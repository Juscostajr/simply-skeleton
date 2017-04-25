<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generic
 *
 * @author usuario
 */
abstract class Generic extends Connection {
    protected $table;
    protected $key;

    abstract public function insert();
    abstract public function update($id);

    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE $this->key = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function findQuery($sql){
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE $this->key = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function deleteAltCol($col,$id){
        $sql = "DELETE FROM $this->table WHERE $col = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function findLast($atrr,$limit)
    {
        $sql = "SELECT * FROM $this->table ORDER BY $atrr DESC LIMIT :limit";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":limit",$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findFirst($atrr,$limit)
    {
        $sql = "SELECT * FROM $this->table ORDER BY $atrr ASC LIMIT :limit";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":limit",$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findInterval($atrr,$min,$max)
    {

        $sql = "SELECT * FROM $this->table ORDER BY $atrr DESC LIMIT :minimo, :maximo";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":minimo", $min, PDO::PARAM_INT);
        $stmt->bindParam(":maximo",$max, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function exec($sql){
        $stmt = DB::prepare($sql);
        return $stmt->execute();
    }

    public function bindNull($param,$atrr,$stmt){
        $atrr || $atrr != null ? $stmt->bindParam($param, $atrr) : $stmt->bindValue($param, null, PDO::PARAM_INT);
    }
}
