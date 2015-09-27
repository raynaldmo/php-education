-- -----------------------------
-- Chapter 10 --
-- -----------------------------

DELIMITER $$
CREATE PROCEDURE add_customer (e VARCHAR(80), f VARCHAR(20), l VARCHAR(40), a1 VARCHAR(80), a2 VARCHAR(80), c VARCHAR(60), s CHAR(2), z MEDIUMINT, p INT, OUT cid INT)
  BEGIN
    INSERT INTO customers (email, first_name, last_name, address1, address2, city, state, zip, phone) VALUES (e, f, l, a1, a2, c, s, z, p);
    SELECT LAST_INSERT_ID() INTO cid;
  END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE add_order (cid INT, uid CHAR(32), ship INT(10), cc MEDIUMINT, OUT total INT(10), OUT oid INT)
  BEGIN
    DECLARE subtotal INT(10);
    INSERT INTO orders (customer_id, shipping, credit_card_number, order_date) VALUES (cid, ship, cc, NOW());
    SELECT LAST_INSERT_ID() INTO oid;
    INSERT INTO order_contents (order_id, product_type, product_id, quantity, price_per) SELECT oid, c.product_type, c.product_id, c.quantity, IFNULL(sales.price, ncp.price) FROM carts AS c INNER JOIN non_coffee_products AS ncp ON c.product_id=ncp.id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='goodies' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="goodies" AND c.user_session_id=uid UNION SELECT oid, c.product_type, c.product_id, c.quantity, IFNULL(sales.price, sc.price) FROM carts AS c INNER JOIN specific_coffees AS sc ON c.product_id=sc.id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='coffee' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="coffee" AND c.user_session_id=uid;
    SELECT SUM(quantity*price_per) INTO subtotal FROM order_contents WHERE order_id=oid;
    UPDATE orders SET total = (subtotal + ship) WHERE id=oid;
    SELECT (subtotal + ship) INTO total;
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE add_transaction (oid INT, trans_type VARCHAR(18), amt INT(10), rc TINYINT, rrc TINYTEXT, tid BIGINT, r TEXT)
  BEGIN
    INSERT INTO transactions VALUES (NULL, oid, trans_type, amt, rc, rrc, tid, r, NOW());
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE clear_cart (uid CHAR(32))
  BEGIN
    DELETE FROM carts WHERE user_session_id=uid;
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE get_order_contents (oid INT)
  BEGIN
    SELECT oc.quantity, oc.price_per, (oc.quantity*oc.price_per) AS subtotal, ncc.category, ncp.name, o.total, o.shipping FROM order_contents AS oc INNER JOIN non_coffee_products AS ncp ON oc.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id INNER JOIN orders AS o ON oc.order_id=o.id WHERE oc.product_type="goodies" AND oc.order_id=oid UNION SELECT oc.quantity, oc.price_per, (oc.quantity*oc.price_per), gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), o.total, o.shipping FROM order_contents AS oc INNER JOIN specific_coffees AS sc ON oc.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id INNER JOIN orders AS o ON oc.order_id=o.id  WHERE oc.product_type="coffee" AND oc.order_id=oid;
  END$$
DELIMITER ;
