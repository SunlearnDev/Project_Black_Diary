CREATE TABLE `messages` (
  `msg_id` int NOT NULL auto_increment primary key,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` text NOT NULL
);