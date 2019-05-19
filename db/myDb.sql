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


CREATE TABLE vehicle (
	vin SERIAL UNIQUE PRIMARY KEY,
	make text NOT NULL,
	model text NOT NULL,
	vehicle_year integer NOT NULL
);

ALTER TABLE vehicle 
ADD COLUMN work_order_id integer REFERENCES work_order,
ADD COLUMN owner_id integer REFERENCES owner;


CREATE TABLE work_order (
	work_order_id SERIAL UNIQUE PRIMARY KEY,
	labor_hours float(2),
	cost float(2),
	start_date date NOT NULL,
	end_date date
);


ALTER TABLE work_order 
ADD COLUMN vin integer REFERENCES vehicle;


CREATE TABLE part (
	part_number SERIAL UNIQUE PRIMARY KEY,
	part_description text NOT NULL,
	manufacturer text NOT NULL, 
	vendor text NOT NULL,
	price float(2) NOT NULL,
	purchase_date date NOT NULL,
	receipt_number text NOT NULL
);

ALTER TABLE part
ADD COLUMN work_order_id integer REFERENCES work_order;


CREATE TABLE owner (
	owner_id SERIAL UNIQUE PRIMARY KEY,
	name_last text NOT NULL,
	name_first text NOT NULL,
	phone_number text,
	email text,
	address text
);
	
	
	