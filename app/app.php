<?php

  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/Places.php';

  session_start();

  if (empty($_SESSION['list_of_city_info'])){
        $_SESSION['list_of_city_info'] = array();
  }


  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'));

  $app->get("/", function() use ($app){
      return $app['twig']->render('content.html.twig', array('content' => Places::getAll()));

  });

  $app->post("/Place_Info", function() use ($app){
  $place = new Places($_POST['Place_Name'],$_POST['Stay_Time']);
        $place->save();
        return $app['twig']->render('create_place.html.twig',
          array('newplace' => $place ));


  });



  return $app;

 ?>
