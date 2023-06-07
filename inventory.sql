CREATE TABLE `products` (
 `product_id` int(11) NOT NULL AUTO_INCREMENT,
 `product` varchar(255) DEFAULT NULL,
 `unit` varchar(255) DEFAULT NULL,
 `price` decimal(11,2) DEFAULT NULL,
 `expiry_date` date DEFAULT NULL,
 `quantity` int(255) DEFAULT NULL,
 `file` longblob DEFAULT NULL,
 PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci