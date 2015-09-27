-- -----------------------------
-- Chapter 13 --
-- -----------------------------

CREATE TABLE `reviews` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_type` enum('coffee','goodies') NOT NULL,
  `product_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  `name` VARCHAR(60) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `review` TEXT NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_type` (`product_type`,`product_id`),
  UNIQUE (`email`, `product_type`, `product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DELIMITER $$
CREATE PROCEDURE add_review (type VARCHAR(7), pid MEDIUMINT, n VARCHAR(60), e VARCHAR(80), r TEXT)
  BEGIN
    INSERT INTO reviews (product_type, product_id, name, email, review) VALUES (type, pid, n, e, r);
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE select_reviews(type VARCHAR(7), pid MEDIUMINT)
  BEGIN
    IF type = 'coffee' THEN
      SELECT review FROM reviews WHERE type='coffee' AND product_id=pid ORDER by date_created DESC;
    ELSEIF type = 'goodies' THEN
      SELECT review FROM reviews WHERE type='goodies' AND product_id=pid ORDER by date_created DESC;
    END IF;
  END$$
DELIMITER ;


-- -----------------------------
-- Chapter 13 --
-- -----------------------------

CREATE TABLE `charges` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `charge_id` VARCHAR(60) NOT NULL,
  `order_id` INT(10) UNSIGNED NOT NULL,
  `type` VARCHAR(18) NOT NULL,
  `amount` INT(10) UNSIGNED NOT NULL,
  `charge` TEXT NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `charge_id` (`charge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DELIMITER $$
CREATE PROCEDURE add_charge (charge_id VARCHAR(60), oid INT, trans_type VARCHAR(18), amt INT(10), charge TEXT)
  BEGIN
    INSERT INTO charges VALUES (NULL, charge_id, oid, trans_type, amt, charge, NOW());
  END$$
DELIMITER ;