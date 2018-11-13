<?php


namespace MyApp;

class Poll{
  private $_db;

  public function __construct(){
     $this->_connectDB();
  }

  private function _connectDB(){
    try{
      $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }catch(\PDOException $e){
      throw new \Exception('Failed to connect DB');
    }
  }
  
  public function post(){
    try{
      $this->_validateAnswer();
      $this->_save();
      // redirect to result.php
      header('Location: https://funspot.tokyo/poll_php/result.php');
    }catch(\Exception $e){
      //set error

      //redirect to inex.php
      header('Location: https://funspot.tokyo/poll_php/index.php');
    }
    exit;
  }
}




