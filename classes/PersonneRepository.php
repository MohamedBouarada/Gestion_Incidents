<?php
include_once 'autoload.php';

class PersonneRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('utilisateur');
    }

}