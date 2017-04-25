<?php
 
use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;
 
//onde irão ficar as entidades do projeto? Defina o caminho aqui
$entidades = array("./app/model");
$isDevMode = true;
 
// configurações de conexão. Coloque aqui os seus dados
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrinedb',
);
 
//setando as configurações definidas anteriormente
$config = Setup::createAnnotationMetadataConfiguration($entidades, $isDevMode);
 
//criando o Entity Manager com base nas configurações de dev e banco de dados
$entityManager = EntityManager::create($dbParams, $config);