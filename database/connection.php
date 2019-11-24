<?php
  $dbh = new PDO('sqlite:database/database.db');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  // activate use of foreign key constraints
  $dbh->exec( 'PRAGMA foreign_keys = ON;' ); 
?>