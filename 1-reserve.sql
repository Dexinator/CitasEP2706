CREATE TABLE `reservations` (
 `res_id` int(11) NOT NULL,
 `res_name` text NOT NULL, 
  `res_mail` text NOT NULL, 
 `res_telefono` varchar(255),
 `res_eventTime` datetime,
  `res_endTime` datetime
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `reservations`
ADD PRIMARY KEY (`res_id`),
ADD KEY `res_name` (`res_name`),
ADD KEY `res_mail` (`res_mail`),
ADD KEY `res_telefono` (`res_telefono`),
ADD KEY `res_eventTime` (`res_eventTime`),
ADD KEY `res_endTime` (`res_endTime`);

ALTER TABLE `reservations`
MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;