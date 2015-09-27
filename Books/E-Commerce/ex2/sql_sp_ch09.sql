-- -----------------------------
-- Chapter 9: --
-- -----------------------------

DELIMITER $$
CREATE PROCEDURE update_cart (uid CHAR(32), type VARCHAR(7), pid MEDIUMINT, qty TINYINT)
  BEGIN
    IF qty > 0 THEN
      UPDATE carts SET quantity=qty, date_modified=NOW() WHERE user_session_id=uid AND product_type=type AND product_id=pid;
    ELSEIF qty = 0 THEN
      CALL remove_from_cart (uid, type, pid);
    END IF;
  END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE add_to_cart (uid CHAR(32), type VARCHAR(7), pid MEDIUMINT, qty TINYINT)
  BEGIN
    DECLARE cid INT;
    SELECT id INTO cid FROM carts WHERE user_session_id=uid AND product_type=type AND product_id=pid;
    IF cid > 0 THEN
      UPDATE carts SET quantity=quantity+qty, date_modified=NOW() WHERE id=cid;
    ELSE
      INSERT INTO carts (user_session_id, product_type, product_id, quantity) VALUES (uid, type, pid, qty);
    END IF;
  END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE remove_from_cart (uid CHAR(32), type VARCHAR(7), pid MEDIUMINT)
  BEGIN
    DELETE FROM carts WHERE user_session_id=uid AND product_type=type AND product_id=pid;
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE get_shopping_cart_contents (uid CHAR(32))
  BEGIN
    SELECT CONCAT("G", ncp.id) AS sku, c.quantity, ncc.category, ncp.name, ncp.price, ncp.stock, sales.price AS sale_price FROM carts AS c INNER JOIN non_coffee_products AS ncp ON c.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='goodies' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="goodies" AND c.user_session_id=uid UNION SELECT CONCAT("C", sc.id), c.quantity, gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, sales.price FROM carts AS c INNER JOIN specific_coffees AS sc ON c.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='coffee' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="coffee" AND c.user_session_id=uid;
  END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_wish_list (uid CHAR(32), type VARCHAR(7), pid MEDIUMINT, qty TINYINT)
  BEGIN
    IF qty > 0 THEN
      UPDATE wish_lists SET quantity=qty, date_modified=NOW() WHERE user_session_id=uid AND product_type=type AND product_id=pid;
    ELSEIF qty = 0 THEN
      CALL remove_from_wish_list (uid, type, pid);
    END IF;
  END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE add_to_wish_list (uid CHAR(32), type VARCHAR(7), pid MEDIUMINT, qty TINYINT)
  BEGIN
    DECLARE cid INT;
    SELECT id INTO cid FROM wish_lists WHERE user_session_id=uid AND product_type=type AND product_id=pid;
    IF cid > 0 THEN
      UPDATE wish_lists SET quantity=quantity+qty, date_modified=NOW() WHERE id=cid;
    ELSE
      INSERT INTO wish_lists (user_session_id, product_type, product_id, quantity) VALUES (uid, type, pid, qty);
    END IF;
  END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE remove_from_wish_list (uid CHAR(32), type VARCHAR(7), pid MEDIUMINT)
  BEGIN
    DELETE FROM wish_lists WHERE user_session_id=uid AND product_type=type AND product_id=pid;
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE get_wish_list_contents (uid CHAR(32))
  BEGIN
    SELECT CONCAT("G", ncp.id) AS sku, wl.quantity, ncc.category, ncp.name, ncp.price, ncp.stock, sales.price AS sale_price FROM wish_lists AS wl INNER JOIN non_coffee_products AS ncp ON wl.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='goodies' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE wl.product_type="goodies" AND wl.user_session_id=uid UNION SELECT CONCAT("C", sc.id), wl.quantity, gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, sales.price FROM wish_lists AS wl INNER JOIN specific_coffees AS sc ON wl.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='coffee' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE wl.product_type="coffee" AND wl.user_session_id=uid;
  END$$
DELIMITER ;