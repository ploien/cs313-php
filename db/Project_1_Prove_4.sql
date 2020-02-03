/*
1. user                  //Account user
   a. user_id PK
   b. user_name NOT NULL UNIQUE
   c. password NOT NULL


2.	owner                 //The vehicle owner
	a.	owener_id PK
	b.	name_last
	c.	name_first
	d.  phone_number
	e.	email
	f.	address


3.	vehicle   			 //Vehicle info
	a.	vehicle_id PK
	b.	make NOT NULL	
	c.	model NOT NULL
	d.	year NOT NULL
	f.	Owner ID FK
	
4.	work_order           //work order for repairs done on vehicle
	a.	work_order_id PK
	b.	labor_hours NOT NULL
	c.	cost NOT NULL
	d.	start_date NOT NULL
	e.	end_date (if complete) NOT NULL
	g.	Vehicle_id FK
	
	
	//This is being left out until I figure out  a good way to include them
3.	Part
	a.	Part Number
	b.	Part Description
	c.	Manufacturer
	d.	Vendor
	e.	Price
	f.	Purchase Date
	g.	Receipt Number
	h.	Work Order Number
	
*/

CREATE TABLE users (
   user_id SERIAL PRIMARY KEY,
   user_name text UNIQUE NOT NULL,
   password text NOT NULL
);

CREATE TABLE owner (
	owner_id SERIAL PRIMARY KEY,
	name_last text NOT NULL,
	name_first text NOT NULL,
	phone_number text,
	email text,
	address text
);

CREATE TABLE vehicle (
	vehicle_id SERIAL PRIMARY KEY,
	make text NOT NULL,
	model text NOT NULL,
	vehicle_year integer NOT NULL,
	owner_id INTEGER REFERENCES owner (owner_id)
);

CREATE TABLE work_order (
	work_order_id SERIAL PRIMARY KEY,
	labor_hours float(2),
	cost float(2),
	start_date date NOT NULL,
	end_date date,
	vehicle_id INTEGER REFERENCES vehicle (vehicle_id)
);

INSERT INTO owner (name_last, name_first, phone_number, email, address) VALUES 
	('Wazowski', 'Mike', '234-412-1234', 'mike@hotmail.com', '123 Monster ln. Topeka, KS 81231'),
	('Smith', 'Robert', '251-651-6122', 'robsmith@gmail.com', '651 Alpine St. Apt. 123 Tacoma, WA'),
	('McDonald', 'Ronald', '531-231-5123', 'ronmcdon@mcdonalds.com', '451 Big Mac Ave. New York');
	
INSERT INTO vehicle (make, model, vehicle_year, owner_id) VALUES
	('Ford', 'Ranger', 1998,(SELECT owner_id FROM owner WHERE (name_last = 'Smith' AND name_first = 'Robert'))),
	('Mazda', 'Protege', 2002, (SELECT owner_id FROM owner WHERE (name_last = 'Smith' AND name_first = 'Robert'))),
	('Ferrari', '488 Spider', 2018, (SELECT owner_id FROM owner WHERE (name_last = 'McDonald' AND name_first = 'Ronald'))),
	('Land Rover', 'Range Rover', 2008, (SELECT owner_id FROM owner WHERE (name_last = 'Wazowski' AND name_first = 'Mike')));


INSERT INTO work_order (labor_hours, cost, start_date, vehicle_id) VALUES
	(2, 240, current_date, (SELECT vehicle_id FROM vehicle WHERE model = 'Ranger')),
	(3, 160, current_date, (SELECT vehicle_id FROM vehicle WHERE model = '488 Spider'));
	



	
	