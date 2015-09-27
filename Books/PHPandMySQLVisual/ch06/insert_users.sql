INSERT INTO users (username, pass,
first_name, last_name, email) VALUES
('troutster', SHA1('mypass'),
'Larry', 'Ullman', 'lu@example.com'),
('funny man', SHA1('monkey'),
'David', 'Brent', 'db@example.com'),
('Gareth', SHA1('asstmgr'), 'Gareth',
'Keenan', 'gk@example.com');