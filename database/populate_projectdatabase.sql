USE projectdatabase;

INSERT INTO users VALUES ('harman', '12345', 'manufacturer');
INSERT INTO users VALUES ('samuel', '12345', 'manufacutrer');
INSERT INTO users VALUES ('vania', '12345', 'customer');

INSERT INTO manufacturers VALUES ('harman', 'Douglas Electronics', 'Douglas Electronics is a small electronics company based out of New Westminster, British Columbia.');
INSERT INTO manufacturers VALUES ('samuel', "Sam's Inc.", "A company based out of Samuel's appartment.");

INSERT INTO products (pname, type, pdescription, price, manufacturer) VALUES ('DE Laptop', 'Computers', 'This 15" laptop with its 250GB SSD and 8GB of RAM is perfect for school.', 999.99, 'harman');
INSERT INTO products (pname, type, pdescription, price, manufacturer) VALUES ('DE Monitor', 'Computer Acessories', '32" monitor with 4K HDR capabilities.', 399.99, 'harman');
INSERT INTO products (pname, type, pdescription, price, manufacturer) VALUES ('SAM Guitar', 'Musical Instruments', 'Best guitar in the world.', 7999.99, 'samuel');
