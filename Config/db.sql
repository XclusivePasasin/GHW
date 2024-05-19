CREATE DATABASE TicketSystem;

USE TicketSystem;

CREATE TABLE Ticket
(
    ID_Ticket int,
    Title varchar(100),
    Description varchar(255),
    CreateDate datetime,
    UpdateDate datetime,
    ID_Status int,
    ID_User int,
    ID_Priority int,
    ID_Difficulty int
);

CREATE TABLE Status
(
    ID_Status int,
    TicketStatus varchar(100)
);

CREATE TABLE Priority
(
    ID_Priority int,
    TicketPriority varchar(100)
);

CREATE TABLE Category
(
    ID_Category int,
    TicketCategory varchar(100)
);

CREATE TABLE User
(
    ID_User int,
    Email varchar(150),
    UserPassword varchar(255),
    ID_Employee int
);

CREATE TABLE Department
(
    ID_Department int,
    Department varchar(100)
);

CREATE TABLE Employee
(
    ID_Employee int,
    Name varchar(100),
    Lastname varchar(100),
    Phone int,
    DUI varchar(10),
    Adress varchar(200),
    ID_Rol int,
    ID_Department int
);

CREATE TABLE Rol
(
    ID_Rol int,
    Rol varchar(100)
);

CREATE TABLE Comment
(
    ID_Comment int,
    Date datetime,
    Content varchar(255),
    ID_Ticket int
);

CREATE TABLE Difficulty
(
    ID_Difficulty int,
    Level int
);

CREATE TABLE Problems
(
    ID_Problem int,
    Name varchar(255),
    ID_Priority int,
    ID_Category int
);

-- Primary Keys

ALTER TABLE Ticket
ADD PRIMARY KEY (ID_Ticket),
MODIFY ID_Ticket INT AUTO_INCREMENT;

ALTER TABLE Status
ADD PRIMARY KEY (ID_Status),
MODIFY ID_Status INT AUTO_INCREMENT;

ALTER TABLE Priority
ADD PRIMARY KEY (ID_Priority),
MODIFY ID_Priority INT AUTO_INCREMENT;

ALTER TABLE Category
ADD PRIMARY KEY (ID_Category),
MODIFY ID_Category INT AUTO_INCREMENT;

ALTER TABLE User
ADD PRIMARY KEY (ID_User),
MODIFY ID_User INT AUTO_INCREMENT;

ALTER TABLE Department
ADD PRIMARY KEY (ID_Department),
MODIFY ID_Department INT AUTO_INCREMENT;

ALTER TABLE Employee
ADD PRIMARY KEY (ID_Employee),
MODIFY ID_Employee INT AUTO_INCREMENT;

ALTER TABLE Rol
ADD PRIMARY KEY (ID_Rol),
MODIFY ID_Rol INT AUTO_INCREMENT;

ALTER TABLE Comment
ADD PRIMARY KEY (ID_Comment),
MODIFY ID_Comment INT AUTO_INCREMENT;

ALTER TABLE Difficulty
ADD PRIMARY KEY (ID_Difficulty),
MODIFY ID_Difficulty INT AUTO_INCREMENT;

ALTER TABLE Problems
ADD PRIMARY KEY (ID_Problem),
MODIFY ID_Problem INT AUTO_INCREMENT;

-- Foreign Keys

-- Table Problems

ALTER TABLE Problems
ADD CONSTRAINT fk_Problems_ID_Priority FOREIGN KEY (ID_Priority) REFERENCES Priority(ID_Priority) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Problems_ID_Category FOREIGN KEY (ID_Category) REFERENCES Category(ID_Category) ON DELETE CASCADE ON UPDATE CASCADE;

-- Table Ticket
ALTER TABLE Ticket
ADD CONSTRAINT fk_Ticket_ID_Status FOREIGN KEY (ID_Status) REFERENCES Status(ID_Status) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Ticket_ID_User FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Ticket_ID_Priority FOREIGN KEY (ID_Priority) REFERENCES Priority(ID_Priority) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Ticket_ID_Difficulty FOREIGN KEY (ID_Difficulty) REFERENCES Difficulty(ID_Difficulty) ON DELETE CASCADE ON UPDATE CASCADE;
-- Table User
ALTER TABLE User
ADD CONSTRAINT fk_User_ID_Employee FOREIGN KEY (ID_Employee) REFERENCES Employee(ID_Employee) ON DELETE CASCADE ON UPDATE CASCADE;
-- Table Employee
ALTER TABLE Employee
ADD CONSTRAINT fk_Employee_ID_Rol FOREIGN KEY (ID_Rol) REFERENCES Rol(ID_Rol) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Employee_ID_Department FOREIGN KEY (ID_Department) REFERENCES Department(ID_Department) ON DELETE CASCADE ON UPDATE CASCADE;
-- Comment
ALTER TABLE Comment
ADD CONSTRAINT fk_Comment_ID_Ticket FOREIGN KEY (ID_Ticket) REFERENCES Ticket(ID_Ticket) ON DELETE CASCADE ON UPDATE CASCADE;

-- Insert Data

-- Insert Data on Table Rol
INSERT INTO Rol (Rol)
VALUES ('Employee'), ('Administrador'), ('Técnico Lvl.1'), ('Técnico Lvl.2'), ('Técnico Lvl.3');

-- Insert Data on Table Department
INSERT INTO Department (Department)
VALUES ('Human Resources'), ('Administration'), ('IT'), ('Customer Service'), ('Finance'), ('Operations'), ('Marketing');

-- Insert Data on Table Category
INSERT INTO Category (TicketCategory)
VALUES ('Hardware'), ('Software');

-- Insert Data on Table Priority
INSERT INTO Priority (TicketPriority)
VALUES ('Low'), ('Medium'), ('High'),('Critical');

-- Insert Data on Table Status
INSERT INTO Status (TicketStatus)
VALUES ('Open'), ('In Progress'), ('Closed');


-- Insert Data on Table Difficulty
INSERT INTO Difficulty (Level)
VALUES (1), (2), (3);

-- Insert Data on Table Problems

INSERT INTO Problems (Name,ID_Priority,ID_Category)
VALUES ('Keyboard',1,1),('Mouse',1,1),('Monitor',2,1),('PC',3,1),('Phone',3,1),('Printer',1,1),('Internet',3,1),
('Outdated software',3,2),('Lack of space',1,2),('The program does not respond',2,2),('Server not found',3,2),('Software licenses',1,2),('Problems accessing the account',1,2),
('Response time issues',2,2),('Virus',4,2),('Operating system problems',4,2),('Backup and recovery',4,2);

INSERT INTO Employee (Name,Lastname,Phone,DUI,Adress,ID_Rol,ID_Department) 
VALUES ('Luis','Majano',70588297,'06250035-9','Santa Tecla',1,1),('Gerardo','Franco',85476438,'09653730-4','Soyapango',2,2),
('Eliezar','Passasin',87594000,'65362547-1','San Salvador',3,3);

INSERT INTO User (Email,UserPassword,ID_Employee)
VALUES ('luismajano@gmail.com','Luis12345',1),('gerardofranco@gmail.com','Gerardo12345',2),('eliezarpassasin@gmail.com','Eliezar12345',3);
