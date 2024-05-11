CREATE DATABASE TicketSystem;

USE TicketSystem;

CREATE TABLE Ticket
(
    ID_Ticket int,
    Title varchar(255),
    Description varchar(255),
    CreateDate datetime,
    UpdateDate datetime,
    ID_Status int,
    ID_User int,
    ID_Priority int,
    ID_Category int
);

CREATE TABLE Status
(
    ID_Status int,
    TicketStatus varchar(255)
);

CREATE TABLE Priority
(
    ID_Priority int,
    TicketPriority varchar(255)
);

CREATE TABLE Category
(
    ID_Category int,
    TicketCategory varchar(255)
);

CREATE TABLE User
(
    ID_User int,
    email varchar(255),
    UserPassword varchar(255),
    ID_Employee int
);

CREATE TABLE Department
(
    ID_Department int,
    Department varchar(255)
);

CREATE TABLE Employee
(
    ID_Employee INT,
    Name varchar(255),
    Lastname varchar(255),
    Phone int,
    DUI varchar(10),
    Adress varchar(255),
    ID_Rol int,
    ID_Department int
);

CREATE TABLE Rol
(
    ID_Rol int,
    Rol varchar(255)
);

CREATE TABLE Comment
(
    ID_Comment int,
    Date datetime,
    Content varchar(255),
    ID_Ticket int
); 

-- Modificar la clave foranea en la tabla Ticekt para usar ON UPDATE CASCADE //Status
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_Status 
    FOREIGN KEY (ID_Status) REFERENCES Status(ID_Status) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON DELETE CASCADE
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_Status 
    FOREIGN KEY (ID_Status) REFERENCES Status(ID_Status) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON UPDATE CASCADE //User
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_User 
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON DELETE CASCADE
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_User 
    FOREIGN KEY (ID_User) REFERENCES User(ID_User) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON UPDATE CASCADE //Priority
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_Priority
    FOREIGN KEY (ID_Priority) REFERENCES Priority(ID_Priority) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON DELETE CASCADE
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_Priority
    FOREIGN KEY (ID_Priority) REFERENCES Priority(ID_Priority) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON UPDATE CASCADE //Category
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_Category
    FOREIGN KEY (ID_Category) REFERENCES Category(ID_Category) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Ticekt para usar ON DELETE CASCADE
    ALTER TABLE Ticket ADD CONSTRAINT fk_Ticket_ID_Category
    FOREIGN KEY (ID_Category) REFERENCES Category(ID_Category) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla User para usar ON UPDATE CASCADE //Employee
    ALTER TABLE User ADD CONSTRAINT fk_User_ID_Employee 
    FOREIGN KEY (ID_Employee) REFERENCES Employee(ID_Employee) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla User para usar ON DELETE CASCADE
    ALTER TABLE User ADD CONSTRAINT fk_User_ID_Employee 
    FOREIGN KEY (ID_Employee) REFERENCES Employee(ID_Employee) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla Employee para usar ON UPDATE CASCADE //Rol
    ALTER TABLE Employee ADD CONSTRAINT fk_Employee_ID_Rol 
    FOREIGN KEY (ID_Rol) REFERENCES Rol(ID_Rol) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Employee para usar ON DELETE CASCADE
    ALTER TABLE Employee ADD CONSTRAINT fk_Employee_ID_Rol 
    FOREIGN KEY (ID_Rol) REFERENCES Rol(ID_Rol) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla Employee para usar ON UPDATE CASCADE //Department
    ALTER TABLE Employee ADD CONSTRAINT fk_Employee_ID_Department
    FOREIGN KEY (ID_Department) REFERENCES Department(ID_Department) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Employee para usar ON DELETE CASCADE
    ALTER TABLE Employee ADD CONSTRAINT fk_Employee_ID_Department
    FOREIGN KEY (ID_Department) REFERENCES Department(ID_Department) 
    ON DELETE CASCADE;

-- Modificar la clave foranea en la tabla Comment para usar ON UPDATE CASCADE //Ticket
    ALTER TABLE Comment ADD CONSTRAINT fk_Comment_ID_Ticket
    FOREIGN KEY (ID_Ticket) REFERENCES  Ticekt (ID_Ticket) 
    ON UPDATE CASCADE;

-- Modificar la clave foranea en la tabla Comment para usar ON DELETE CASCADE
    ALTER TABLE Comment ADD CONSTRAINT fk_Comment_ID_Ticket
    FOREIGN KEY (ID_Ticket) REFERENCES  Ticekt (ID_Ticket) 
    ON DELETE CASCADE;
