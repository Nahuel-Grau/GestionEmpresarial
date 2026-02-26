<?php 

Class Product{
private PDO $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

     public function crear($usuario,$nombre, $precio){
        $sentencia = $this->db->prepare(
            "INSERT INTO `productos` (`id`,`usuario_id`, `nombre`, `precio`) VALUES (NULL, ?, ?,?)"
        );

        return $sentencia->execute([$usuario,$nombre,$precio]);
     }

     public function todos($usuario){
        $sentencia = $this->db->prepare("SELECT * FROM productos WHERE usuario_id = :usuario_id");
        $sentencia->execute([
            ':usuario_id' =>$usuario,

        ]);        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
     }

     public function borrar($id){
        
        $sentencia = $this->db->prepare("DELETE FROM productos WHERE `productos`.`id` = :id");
        $sentencia->execute([
            ':id' =>$id,
        ]);
        return $sentencia;
    } 
    public function buscarPorId($id){
        $sentencia = $this->db->prepare("SELECT * FROM `productos` WHERE `id` = :id");
        $sentencia->execute([
            'id' =>$id,
        ]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}