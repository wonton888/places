<?php

  class Places
  {

    private $city_name;
    private $stay_time;


    function __construct($city_name, $stay_time)
    {

      $this->city_name = $city_name;
      $this->stay_time = $stay_time;

    }

    function setCityName($new_city)
    {

      $this->city_name = $new_city;

    }

    function getCityName()
    {

      return $this->city_name;

    }

    function setStayTime($new_time)
    {
      $this->stay_time = $new_time;

    }

    function getStayTime()
    {
      return $this->stay_time;

    }

    function save()
    {
      array_push($_SESSION['list_of_city_info'], $this);
    }

    static function getAll()
    {
      return $_SESSION['list_of_city_info'];
    }

    static function deleteAll()
    {
      $_SESSION['list_of_city_info'] = array();
    }

  }

 ?>
