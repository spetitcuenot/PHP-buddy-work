SELECT UPPER(`last_name`) AS `NAME`, `first_name`, `price`
FROM subscription
       INNER JOIN `member` ON `member`.`id_sub` = `subscription`.`id_sub`
       INNER JOIN `user_card` ON `user_card`.`id_user` = `member`.`id_user_card`
WHERE `price` > 42
ORDER BY `last_name`, `first_name` ASC;
