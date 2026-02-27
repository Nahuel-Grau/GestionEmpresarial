<?php

class Category{
    private PDO $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }
    
    public function crear($usuario, $tipo, $nombre){
        $sentencia = $this->db->prepare(
            "INSERT INTO categorias (usuario_id,tipo,nombre)
             VALUES (?, ?, ?,)"
        );

        return;
    }

    //en teoria lo que esta arriba esta terminado y lo que está abajo tengo que modificar


    public function borrar($id){
        
        $sentencia = $this->db->prepare("DELETE FROM categorias WHERE `categorias`.`id` = :id");
        $sentencia->execute([
            ':id' =>$id,
        ]);
        return ;
    }

    public function buscarPorId($id){
        $sentencia = $this->db->prepare("SELECT * FROM `categorias` WHERE `id` = :id");
        $sentencia->execute([
            'id' =>$id,
        ]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function modificar($id,$tipo,$nombre){
        $sentencia = $this->db->prepare("UPDATE categorias 
            SET tipo = :tipo, nombre = :nombre 
            WHERE id = :id");
            
            $sentencia->execute([
            ':id'=>$id,
            ':tipo'=>$tipo,
            ':nombre'=>$nombre

        ]);
        return $sentencia;      
    }

    
    }