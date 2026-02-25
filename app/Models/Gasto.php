<?php

class Gasto{
    private PDO $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function crear($categoria, $usuario, $monto, $descripcion, $fecha){
        $sentencia = $this->db->prepare(
            "INSERT INTO gastos (categoria_id, usuario_id, monto, descripcion,fecha)
             VALUES (?, ?, ?, ?, ?)"
        );

        return $sentencia->execute([$categoria, $usuario, $monto, $descripcion, $fecha]);
    }

    public function todos(int $usuario){
        $primerDia= (new DateTime('first day of this month'))->format('Y-m-d');
        $ultimoDia = (new DateTime('last day of this month'))->format('Y-m-d');
        $sentencia = $this->db->prepare("SELECT * FROM gastos WHERE usuario_id = :usuario_id AND fecha BETWEEN :inicio AND :fin");
        $sentencia->execute([
            ':usuario_id' =>$usuario,
            ':inicio' =>$primerDia,
            ':fin' =>$ultimoDia
        ]);        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


    public function borrar($id){
        
        $sentencia = $this->db->prepare("DELETE FROM gastos WHERE `gastos`.`id` = :id");
        $sentencia->execute([
            ':id' =>$id,
        ]);
        return $sentencia;
    }

    public function buscarPorId($id){
        $sentencia = $this->db->prepare("SELECT * FROM `gastos` WHERE `id` = :id");
        $sentencia->execute([
            'id' =>$id,
        ]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function modificar($id,$monto,$descripcion){
        $sentencia = $this->db->prepare("UPDATE gastos 
            SET monto = :monto, descripcion = :descripcion 
            WHERE id = :id");
            
            $sentencia->execute([
            ':id'=>$id,
            ':monto'=>$monto,
            ':descripcion'=>$descripcion

        ]);
        return $sentencia;      
    }

    public function sumatoria(int $usuario){
        $gastos = $this->todos($usuario);
        $total = 0;
        foreach ($gastos as $gasto){
            $total += $gasto->monto;
        }

        return $total;
    }
}