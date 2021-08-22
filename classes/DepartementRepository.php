<?php

include_once 'autoload.php';

class DepartementRepository extends Repository{
    public function __construct()
    {
        parent::__construct('departement');
    }

}