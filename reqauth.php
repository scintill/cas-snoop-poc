<?php

require_once('phpCAS/CAS.php');

phpCAS::client(CAS_VERSION_2_0,'cas.byu.edu',443,'cas');
phpCAS::setCasServerCACert(dirname(__FILE__).'/authorities.pem');
phpCAS::forceAuthentication();

