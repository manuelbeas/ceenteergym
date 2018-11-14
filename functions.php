<?php

  function check_in_range($fecha_inicio, $fecha_fin, $fecha){
    if($fecha_inicio != null){
       $fecha_inicio = strtotime($fecha_inicio);
       $fecha_fin = strtotime($fecha_fin);
       $fecha = strtotime($fecha);
       if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {
         return true;
       } else {
         return false;
       }
     }
     else {
       return true;
     }
   }

   function between_two_dates($date1, $date2){
     $datetime1 = new DateTime($date1);
     $datetime2 = new DateTime($date2);
     $interval = $datetime1->diff($datetime2);
     if($interval->format('%d') == '1'){
       return $interval->format('%R%a día');
     }
     else {
       return $interval->format('%R%a días');
     }

   }


   function get_today(){
     $date = new DateTime();
     return $date;
   }

   function convertStringToDate($date){
     $time = strtotime($date);
     $dateformated = date('Y-m-d',$time);
     return $dateformated;
   }

   function moveImage($i, $sexo){
     $r = null;
     if($sexo == 1){
       $r = 'images/customers/default/male.png';
     }else {
       $r = 'images/customers/default/female.png';
     }

     if($i["error"]>0){
       # echo "Hubo un error al intentar subir la imagen.";
     } else {
       $permitidos = array("image/png","image/jpg","image/jpeg");
       $limite_kb = 10000;

       if(in_array($i["type"], $permitidos) && $i["size"] <= $limite_kb * 1024){
         $ruta = 'images/customers/';
         $nombrealeatorio = generateRandomString(10);
         $imagen = $ruta.$nombrealeatorio;

         if(!file_exists($ruta)){
           mkdir($ruta);
         }

         if(!file_exists($imagen)){

           $resultado = @move_uploaded_file($i["tmp_name"], $imagen);

           if($resultado){
             # echo "Se subió la imagen";
             $r = $imagen;
           }else {
             # echo "No se subió la imagen";
           }

         }
         else {
           # echo "El archivo ya existe";
         }

       }
       else {
         # echo "Archivo no permitido o excede el tamaño";
       }
     }

     return $r;
   }


   function generateRandomString($length) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

 ?>
