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

CREATE TABLE _User
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
    _Date datetime,
    Content varchar(255),
    ID_Ticket int
); 

//Hay que insertar los datos de las tablas que no cuentan con llaves foraneas en ellas antes de rellenar las principales.