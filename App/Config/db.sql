CREATE DATABASE TicketSystem;

USE TicketSystem;

CREATE TABLE Ticket
(
    ID_Ticket int AUTO_INCREMENT PRIMARY KEY,
    Title varchar(100),
    Description varchar(255),
    CreateDate datetime,
    UpdateDate datetime,
    ID_Status int,
    ID_User int,
    ID_Priority int,
    ID_Category int,
    ID_Difficulty int
);

CREATE TABLE Status
(
    ID_Status int AUTO_INCREMENT PRIMARY KEY,
    TicketStatus varchar(100)
);

CREATE TABLE Priority
(
    ID_Priority int AUTO_INCREMENT PRIMARY KEY,
    TicketPriority varchar(100)
);

CREATE TABLE Category
(
    ID_Category int AUTO_INCREMENT PRIMARY KEY,
    TicketCategory varchar(100)
);

CREATE TABLE User
(
    ID_User int AUTO_INCREMENT PRIMARY KEY,
    Email varchar(150),
    UserPassword varchar(255),
    ID_Employee int
);

CREATE TABLE Department
(
    ID_Department int AUTO_INCREMENT PRIMARY KEY,
    Department varchar(100)
);

CREATE TABLE Employee
(
    ID_Employee INT AUTO_INCREMENT PRIMARY KEY,
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
    ID_Rol int AUTO_INCREMENT PRIMARY KEY,
    Rol varchar(100)
);

CREATE TABLE Comment
(
    ID_Comment int AUTO_INCREMENT PRIMARY KEY,
    Date datetime,
    Content varchar(255),
    ID_Ticket int
);

CREATE TABLE Difficulty
(
    ID_Difficulty int PRIMARY KEY,
    Level int
);

-- Table Ticket
ALTER TABLE Ticket
ADD CONSTRAINT fk_Ticket_ID_Status FOREIGN KEY (ID_Status) REFERENCES Status(ID_Status) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Ticket_ID_User FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Ticket_ID_Priority FOREIGN KEY (ID_Priority) REFERENCES Priority(ID_Priority) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fk_Ticket_ID_Category FOREIGN KEY (ID_Category) REFERENCES Category(ID_Category) ON DELETE CASCADE ON UPDATE CASCADE,
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

--Insert Data

--Insert Data on Table Rol
INSERT INTO Rol (Rol)
VALUES ('Employee'), ('Administrador'), ('Técnico Lvl.1'), ('Técnico Lvl.2'), ('Técnico Lvl.3');

--Insert Data on Table Department
INSERT INTO Department (Department)
VALUES ('Human Resources'), ('Administration'), ('IT'), ('Customer Service'), ('Finance'), ('Operations'), ('Marketing');

--Insert Data on Table Category
INSERT INTO Category (TicketCategory)
VALUES ('Hardware'), ('Software');

--Insert Data on Table Priority
INSERT INTO Priority (TicketPriority)
VALUES ('Low'), ('Medium'), ('High'),('Critical');

--Insert Data on Table Status
INSERT INTO Status (TicketStatus)
VALUES ('Open'), ('In Progress'), ('Closed');


--Insert Data on Table Difficulty
INSERT INTO Difficulty (Level)
VALUES (1), (2), (3);
