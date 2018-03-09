<?php
require_once 'model/dbconnect.php';

//class with only static functions that talks whit db
class Db_handler{

 
    public static function get_all_couples(){
        //resalt will be the table of the query
        $resalt = Database::getInstance()->getConnection()->query("SELECT * FROM wedding.couples;");
        if($resalt){ //if the query returns not false
             if($resalt->num_rows > 0){
                while($row = $resalt->fetch_object()){ //takes a table row and makes it an object
                    $arr[] = $row; //evry interation push the object into the arr array
                }
                return $arr;
             }
            return [];
        }else{
            return false;
        }
    }
      public static function getNameById($id){
        $resalt = Database::getInstance()->getConnection()->query("SELECT `Name` FROM wedding.couples where Id = $id");
        if($resalt){
             if($resalt->num_rows > 0){
                while($row = $resalt->fetch_object()){
                    $name = $row->Name;
                }
                return $name;
             }
        }else{
            return false;
        }
    }
    public static function newCouple($name){
        $resalt = Database::getInstance()->getConnection()->query("INSERT INTO `wedding`.`couples` (`Name`) VALUES ('$name')");
        $resalt = Database::getInstance()->getConnection()->insert_id;
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }
    public static function getAllGroups(){
        $coupleId = $_SESSION['coupleId'];
         $resalt = Database::getInstance()->getConnection()->query("SELECT * FROM wedding.`group` where Couple_id = $coupleId");
        if($resalt){
             if($resalt->num_rows > 0){
                while($row = $resalt->fetch_object()){
                    $arr[] = $row;
                }
                return $arr;
             }
            return [];
        }else{
            return false;
        }
    }
    
    public static function addGroup($coupleId,$name){
        $resalt = Database::getInstance()->getConnection()->query("INSERT INTO `wedding`.`group` (`Couple_id`, `Name`) VALUES ('$coupleId', '$name')");
        $resalt = Database::getInstance()->getConnection()->insert_id;
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }
      public static function getAllTables(){
        $coupleId = $_SESSION['coupleId'];
         $resalt = Database::getInstance()->getConnection()->query("SELECT * FROM wedding.`tables` where Couple_id = $coupleId");
        if($resalt){
             if($resalt->num_rows > 0){
                while($row = $resalt->fetch_object()){
                    $arr[] = $row;
                }
                return $arr;
             }
            return [];
        }else{
            return false;
        }
    }
     public static function addTable($coupleId,$tableNumber,$seats){
        $resalt = Database::getInstance()->getConnection()->query("INSERT INTO `wedding`.`tables` (`Couple_id`, `Table_number`, `Seats`) VALUES ('$coupleId', '$tableNumber', '$seats');");
        $resalt = Database::getInstance()->getConnection()->insert_id;
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }
     public static function addGest($coupleId,$firstName,$famelyName,$age,$gender,$phone,$group1,$group2,$group3){
        $resalt = Database::getInstance()->getConnection()->query("INSERT INTO `wedding`.`gest` (`Couple_id`, `First_name`, `Family_name`, `Age`, `Gender`, `Phone`, `group1`, `group2`, `group3`) VALUES ('$coupleId', '$firstName', '$famelyName', '$age', '$gender', '$phone', '$group1', '$group2', '$group3');");
        $resalt = Database::getInstance()->getConnection()->insert_id;
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }
       public static function getAllGests(){
        $coupleId = $_SESSION['coupleId'];
         $resalt = Database::getInstance()->getConnection()->query("SELECT `gest`.Id,`gest`.Couple_id,First_name,Family_name,Age,Gender,Phone, g1.`Name` as group1, g2.`Name` as group2, g3.`Name`as group3,Arrived FROM wedding.`gest` 
            join wedding.`group` g1 on `gest`.group1 = g1.Id 
            join wedding.`group` g2 on `gest`.group2 = g2.Id 
            join wedding.`group` g3 on `gest`.group3 = g3.Id 
            where `gest`.Couple_id = $coupleId");
        if($resalt){
             if($resalt->num_rows > 0){
                while($row = $resalt->fetch_object()){
                    $arr[] = $row;
                }
                return $arr;
             }
            return [];
        }else{
            return false;
        }
    }
     public static function gestArrive($gestId){
        $resalt = Database::getInstance()->getConnection()->query("UPDATE `wedding`.`gest` SET `Arrived`='1' WHERE `Id`='$gestId'");
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }
      public static function deleteGest($gestId){
        $resalt = Database::getInstance()->getConnection()->query("DELETE FROM `wedding`.`gest` WHERE `Id`='$gestId'");
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }
    public static function deleteTable($tabletId){
        $resalt = Database::getInstance()->getConnection()->query("DELETE FROM `wedding`.`tables` WHERE `Id`='$tabletId'");
        if($resalt){
            return  $resalt;
        }else{
            return false;
        }
    }

    // public static function edit_playlist($id,$playlist_name,$img_path){
    //     $resalt = Database::getInstance()->getConnection()->query("UPDATE `play`.`playlist` SET `Name`='$playlist_name', `Img_path`='$img_path' WHERE `Id`=$id");
    //     if($resalt){
    //         return  $resalt;
    //     }else{
    //         return false;
    //     }
    // }
    // public static function get_img($id){
    //     $resalt = Database::getInstance()->getConnection()->query("SELECT Img_path FROM play.playlist where Id = $id");
    //     if($resalt){
    //         if($resalt->num_rows > 0){
    //             while($row = $resalt->fetch_object()){
    //                 $img = $row->Img_path;
    //             }
    //             return $img;
    //         }
    //     }
    // }
    //  public static function add_track($track_name,$target_file){
    //     $resalt = Database::getInstance()->getConnection()->query("INSERT INTO `play`.`track` (`Name`, `Path`) VALUES ('$track_name', '$target_file')");
    //     if($resalt){
    //         $id = Database::getInstance()->getConnection()->insert_id;
    //         if($id){
    //             return  $id;
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         //the track is all ready in db
    //         $resalt = Database::getInstance()->getConnection()->query("SELECT Id FROM play.track where `Path` ='$target_file'");
    //         if($resalt){
    //            if($resalt->num_rows > 0){
    //                 while($row = $resalt->fetch_object()){
    //                     $id = $row->Id;
    //                 }
    //                 return $id;
    //            }
    //         }else{
    //             return false;
    //         }
            
    //     }
        
    // }
    //  public static function attach_track_to_playlist($playlist_id,$track_id){
    //     $resalt = Database::getInstance()->getConnection()->query("INSERT INTO `play`.`playlist_track` (`Track_id`, `playlist_id`) VALUES ('$track_id)', '$playlist_id')");
    //     if($resalt){
    //         return  $resalt;
    //     }else{
    //         return false;
    //     }
    // }
    // public static function get_all_tracks(){
    //     require_once 'model/track.php'; 
    //     $resalt = Database::getInstance()->getConnection()->query("SELECT Id, `Name` FROM play.track");
    //     if($resalt){
    //          if($resalt->num_rows > 0){
    //             while($row = $resalt->fetch_object('Track')){
    //                 $arr[] = $row;
    //             }
    //             return $arr;
    //          }
    //         return [];
    //     }else{
    //         return false;
    //     }
    // }
    // public static function get_playlist_tracks($id){
    //     require_once 'model/track.php';  
    //     $resalt = Database::getInstance()->getConnection()->query("SELECT track.Id, track.`Name`, track.Path FROM play.playlist_track join track on track.Id = playlist_track.Track_id where playlist_id = $id");
    //     if($resalt){
    //          if($resalt->num_rows > 0){
    //             while($row = $resalt->fetch_object('Track')){
    //                 $arr[] = $row;
    //             }
    //             return $arr;
    //          }
    //         return [];
    //     }else{
    //         return false;
    //     }
    // }
    // public static function serch_playlist($serchText){
    //     require_once 'model/playlist.php';  
    //     $resalt = Database::getInstance()->getConnection()->query("SELECT * FROM play.playlist where Name like '%$serchText%'");
    //     if($resalt){
    //         if($resalt->num_rows > 0){
    //             while($row = $resalt->fetch_object('Playlist')){
    //                 $arr[] = $row;
    //             }
    //             return $arr;
    //         }
    //     }else{
    //         return false;
    //     }
    // }
    // public static function delete_playlist($id){
    //      $resalt = Database::getInstance()->getConnection()->query("DELETE FROM `play`.`playlist` WHERE `Id`='$id'");
    //      if($resalt){
    //          return  true;
    //      }else{
    //          return false;
    //      }
    // }
    //     public static function delete_playlist_tracks($id){
    //      $resalt = Database::getInstance()->getConnection()->query("DELETE FROM `play`.`playlist_track` where `playlist_id` = '$id'");
    //      if($resalt){
    //          return  true;
    //      }else{
    //          return false;
    //      }
    // }


    



}
  ?>