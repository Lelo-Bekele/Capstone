CREATE TABLE IF NOT EXISTS `borrower_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemical_name` varchar(30) NOT NULL,
  `borrower_name` varchar(25) NOT NULL,
  `bottle_size` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `chemical_inventory` (
  `chemical_name` varchar(255) NOT NULL,
  `formula` char(100) DEFAULT NULL,
  `bottle_size` int(11) DEFAULT NULL,
  `compound` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chemical_name`)
);