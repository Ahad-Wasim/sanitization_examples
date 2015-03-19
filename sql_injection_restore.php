<?php

$restore = <<<EOF


CREATE TABLE IF NOT EXISTS `sql_inject_target` (
  `name` varchar(20) NOT NULL,
  `age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1
;
--
INSERT INTO `sql_inject_target` (`name`, `age`) VALUES
('George', 25),
('Hector', 23),
('Grace', 25),
('Mike', 22),
('Coruthers', 28);

EOF
    ;