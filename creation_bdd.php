<?php
$servername = "us-cdbr-east-03.cleardb.com";
$username = "be460bc87bab43";
$password = "2fe501de";
$dbname = "heroku_7c2ac3a00a455e9";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE `association_user_date` (
    `id_user` int(11) NOT NULL,
    `id_dateAtelier` int(11) NOT NULL
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
  

  CREATE TABLE `atelier` (
  `id_atelier` int(11) NOT NULL,
  `id_prestation` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

CREATE TABLE `date_atelier` (
  `id_dateAtelier` int(11) NOT NULL,
  `id_atelier` int(11) NOT NULL,
  `date_atelier` datetime NOT NULL,
  `nb_place` int(11) NOT NULL,
  `id_prestation` int(11) NOT NULL,
  `etat` int(1) DEFAULT 1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

CREATE TABLE `prestation` (
  `id_prestation` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  
  `password` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `role` int(2) NOT NULL,
  `etat` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

ALTER TABLE `atelier`
  ADD PRIMARY KEY (`id_atelier`);

  ALTER TABLE `date_atelier`
  ADD PRIMARY KEY (`id_dateAtelier`);

  ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id_prestation`);

  ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
  ";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "La liste des tables a été créé !";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?> 