<?php
include_once 'autoload.php';

class IncidentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('incident');
    }

}