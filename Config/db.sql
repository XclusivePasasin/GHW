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
    Phone varchar(9),
    DUI varchar(10),
    Address varchar(200),
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
VALUES ('Employee'), ('Administrator'), ('Technical Lvl.1'), ('Technical Lvl.2'), ('Technical Lvl.3');

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

INSERT INTO Employee (ID_Employee,Name,Lastname,Phone,DUI,Address,ID_Rol,ID_Department) 
VALUES (1,'Luis','Majano',70588297,'06250035-9','Santa Tecla',1,1),(2,'Gerardo','Franco',85476438,'09653730-4','Soyapango',1,2),
(3,'Eliazar','Pasasin',87594000,'65362547-1','San Salvador',1,3);

INSERT INTO User (ID_User,Email,UserPassword,ID_Employee)
VALUES (1,'Majano@codelab.sv','demo',1),(2,'Franco@codelab.sv','demo',2),(3,'Pasasin@codelab.sv','demo',3); 

-- Views
CREATE VIEW User_Info AS
SELECT 
    e.ID_Employee AS ID_Employee,
    e.Name AS Name,
    e.Lastname AS Lastname,
    e.Phone AS Phone,
    e.DUI AS DUI,
    e.Address AS Address,
    e.ID_Rol AS ID_Rol,
    r.Rol AS Rol,
    e.ID_Department AS ID_Department,
    d.Department AS Department,
    u.ID_User AS ID_User,
    u.Email AS Email,
    u.UserPassword AS Password
FROM 
    Employee e
INNER JOIN 
    User u ON e.ID_Employee = u.ID_Employee
INNER JOIN 
    Rol r ON e.ID_Rol = r.ID_Rol
INNER JOIN 
    Department d ON e.ID_Department = d.ID_Department;

-- Stored process to update user

DELIMITER //
 
CREATE PROCEDURE sp_UpdateUser(
    IN idEmployee INT, 
    IN name VARCHAR(100), 
    IN lastname VARCHAR(100), 
    IN phone VARCHAR(9), 
    IN dui VARCHAR(10), 
    IN address VARCHAR(200), 
    IN idRol INT, 
    IN idDepartment INT,
    IN idUser INT,
    IN email VARCHAR(150),
    IN userPassword VARCHAR(255)
)
BEGIN
    UPDATE Employee 
    SET 
        Name = name, 
        Lastname = lastname, 
        Phone = phone, 
        DUI = dui, 
        Address = address, 
        ID_Rol = idRol, 
        ID_Department = idDepartment
    WHERE ID_Employee = idEmployee;
    UPDATE User 
    SET 
        Email = email, 
        UserPassword = userPassword
    WHERE ID_User = idUser;
END //
 
DELIMITER ;

DELIMITER //

CREATE PROCEDURE sp_InsertTicket(
    IN idTicket INT, 
    IN Title VARCHAR(100), 
    IN Description VARCHAR(255), 
    IN idStatus INT, 
    IN idUser INT, 
    IN idPriority INT,
    IN idDifficulty INT
)
BEGIN
    DECLARE CreateDate DATETIME;
    DECLARE UpdateDate DATETIME;

    SET CreateDate = NOW();
    SET UpdateDate = NOW();

    INSERT INTO Ticket (ID_Ticket, Title, Description, CreateDate, UpdateDate, ID_Status, ID_User, ID_Priority, ID_Difficulty)
    VALUES (idTicket, Title, Description, CreateDate, UpdateDate, idStatus, idUser, idPriority, idDifficulty);
END //

DELIMITER ;

DELIMITER //
 
CREATE PROCEDURE sp_UpdateTicket(
    IN idTicket INT,
    IN Title VARCHAR(100),
    IN Description VARCHAR(255),
    IN CreateDate DATETIME,  
    IN idStatus INT,
    IN idUser INT,
    IN idPriority INT,
    IN idDifficulty INT,
)
BEGIN
    DECLARE UpdateDate DATETIME;  
    SET UpdateDate = NOW();
 
    UPDATE Ticket
    SET
        Title = Title,
        Description = Description,
        CreateDate = CreateDate,  
        ID_Status = idStatus,
        ID_User = idUser,
        ID_Priority = idPriority
        ID_Difficulty = idDifficulty,
    WHERE ID_Ticket = idTicket;
END //
 
DELIMITER ;

