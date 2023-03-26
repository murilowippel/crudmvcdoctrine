<?php
// bootstrap.php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAnnotationMetadataConfiguration(
	array(__DIR__ . "/src/model"),
	true,
	null,
	null,
	false
);

// configuring the database connection
$connection = DriverManager::getConnection([
	'driver'   => 'pdo_mysql',
	'user'     => 'root',
	'password' => '',
	'dbname'   => 'contactsys',
], $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
