/*
1.	Vehicle
	a.	VIN
	b.	Make 
	c.	Model
	d.	Year
	e.	Work Order ID 
	f.	Owner ID
2.	Work order
	a.	ID
	b.	Labor Hours
	c.	Cost
	d.	Start date
	e.	End date (if complete)
	f.	//Part number(s) (Won’t include for now because I’m not sure how to store multiple parts is one column)
	g.	Vehicle VIN
3.	Part
	a.	Part Number
	b.	Part Description
	c.	Manufacturer
	d.	Vendor
	e.	Price
	f.	Purchase Date
	g.	Receipt Number
	h.	Work Order Number
4.	Owner
	a.	ID
	b.	Last Name
	c.	First Name
	d.	Phone Number
	e.	Email
	f.	Address
*/

CREATE TABLE users (
   user_name text UNIQUE PRIMARY KEY,
   password text NOT NULL
);

CREATE TABLE vehicle (
	vin SERIAL UNIQUE PRIMARY KEY,
	make text NOT NULL,
	model text NOT NULL,
	vehicle_year integer NOT NULL
);

CREATE TABLE work_order (
	work_order_id SERIAL UNIQUE PRIMARY KEY,
	labor_hours float(2),
	cost float(2),
	start_date date NOT NULL,
	end_date date
);

CREATE TABLE part (
	part_number SERIAL UNIQUE PRIMARY KEY,
	part_description text NOT NULL,
	manufacturer text NOT NULL, 
	vendor text NOT NULL,
	price float(2) NOT NULL,
	purchase_date date NOT NULL,
	receipt_number text NOT NULL
);

CREATE TABLE owner (
	owner_id SERIAL UNIQUE PRIMARY KEY,
	name_last text NOT NULL,
	name_first text NOT NULL,
	phone_number text,
	email text,
	address text
);

ALTER TABLE vehicle 
ADD COLUMN work_order_id integer REFERENCES work_order,
ADD COLUMN owner_id integer REFERENCES owner;

ALTER TABLE work_order 
ADD COLUMN vin integer REFERENCES vehicle;

ALTER TABLE part
ADD COLUMN work_order_id integer REFERENCES work_order;


INSERT INTO owner (name_last, name_first, phone_number, email, address) VALUES 
	('Wazowski', 'Mike', '234-412-1234', 'mike@hotmail.com', '123 Monster ln. Topeka, KS 81231'),
	('Smith', 'Robert', '251-651-6122', 'robsmith@gmail.com', '651 Alpine St. Apt. 123 Tacoma, WA'),
	('McDonald', 'Ronald', '531-231-5123', 'ronmcdon@mcdonalds.com', '451 Big Mac Ave. New York');
	
INSERT INTO vehicle (make, model, vehicle_year) VALUES
	('Ford', 'Ranger', 1998),
	('Mazda', 'Protege', 2002),
	('Ferrari', '488 Spider', 2018),
	('Land Rover', 'Range Rover', 2008);
	
UPDATE vehicle SET owner_id = (SELECT owner_id FROM owner WHERE (name_last = 'Smith' AND name_first = 'Robert'))
WHERE (make = 'Ford' OR make = 'Mazda');

UPDATE vehicle SET owner_id = (SELECT owner_id FROM owner WHERE (name_last = 'Wazowski' AND name_first = 'Mike'))
WHERE (make = 'Land Rover');

UPDATE vehicle SET owner_id = (SELECT owner_id FROM owner WHERE (name_last = 'McDonald' AND name_first = 'Ronald'))
WHERE (make = 'Ferrari');

INSERT INTO work_order (labor_hours, cost, start_date, vin) VALUES
	(2, 240, current_date, (SELECT vin FROM vehicle WHERE model = 'Ranger')),
	(3, 160, current_date, (SELECT vin FROM vehicle WHERE model = '488 Spider'));
	
DELETE FROM work_order WHERE vin IS NULL;
/*
Team Activity 05 queries
*/

CREATE TABLE scriptures (
   id SERIAL UNIQUE PRIMARY KEY,
   book VARCHAR(255),
   chapter integer,
   verse integer,
   content text
);

INSERT INTO scriptures (book, chapter, verse, content)
	VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
	
INSERT INTO scriptures (book, chapter, verse, content)
	VALUES ('Doctrine and Covenants', 88, 49, 'The alight shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall bcomprehend even God, being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content)
	VALUES ('Doctrine and Covenants', 93, 28, 'He that akeepeth his commandments receiveth btruth and clight, until he is glorified in truth and dknoweth all things.');
	
INSERT INTO scriptures (book, chapter, verse, content)
	VALUES ('Mosiah', 16, 9, 'He is the alight and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');


	
	