<?php

namespace App\Models;


class Listing{
  public static function all(){

    return(
      [
        [
         'id' => 1,
         'title' =>'people of god 1',
         'description' => 'hshjsjkjskkskkskkkkkkkskkksks for id one'
        ] ,
        [
         'id' => 2,
         'title' =>'people of god 2',
         'description' => 'hshjsjkjskkskkskkkkkkkskkksks for id two'
        ] 

     ]
    );

  }
 
 public static function find($id){
  $listings = self::all();

  foreach ($listings as $listing) {

    if ($id == $listing['id']) {

      return $listing;
      # code...
    }


  }


 }
}


?>