<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

function getEntityManager() {
    $entityManager = null;

    if ($entityManager === null) {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/Phinx/db/manut.db',
        );

        $entityManager = EntityManager::create($conn, $config);
    }

    return $entityManager;
}
