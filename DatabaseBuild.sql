
-- ===================================================================
-- Arena-DatabaseBuild
--   This script builds the Arena database and its table.  It also 
-- inserts data into the table.
-- ===================================================================

-- -------------------------------------------------------------------
-- Save selected MySQL settings
-- -------------------------------------------------------------------
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -------------------------------------------------------------------
-- Delete and create database
-- -------------------------------------------------------------------
DROP SCHEMA IF EXISTS `dbTickets` ;
CREATE SCHEMA IF NOT EXISTS `dbTickets` DEFAULT CHARACTER SET utf8 ;

-- -------------------------------------------------------------------
-- Switch to dbTickets database
-- -------------------------------------------------------------------
USE dbTickets;

-- -------------------------------------------------------------------
-- Delete and create table `dbTickets`.`tbTickets`
-- -------------------------------------------------------------------
DROP TABLE IF EXISTS `dbTickets`.`tbTickets` ;
CREATE TABLE IF NOT EXISTS `dbTickets`.`tbTickets` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Event` VARCHAR(60) NOT NULL,
  `EventDate` VARCHAR(20) NOT NULL,
  `Tickets` int NOT NULL,
  `Total` decimal(15,2) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;

-- -------------------------------------------------------------------
-- Insert data into table `dbCities`.`tbCities`
-- -------------------------------------------------------------------
INSERT INTO tbTickets (Name, Event, EventDate, Tickets, Total) VALUES ('John Smith', 'Carolina-Game 1', '2021-01-02', '12', '120.00');
INSERT INTO tbTickets (Name, Event, EventDate, Tickets, Total) VALUES ('Kelly Maisel', 'Chicago-Game 1', '2021-03-06', '2', '50.00');
INSERT INTO tbTickets (Name, Event, EventDate, Tickets, Total) VALUES ('Joe Biden', 'Texas-Game 2', '2021-02-12', '8', '400.00');
INSERT INTO tbTickets (Name, Event, EventDate, Tickets, Total) VALUES ('Bennie Maisel', 'Nashville-Game 2', '2021-02-25', '2', '60.00');
INSERT INTO tbTickets (Name, Event, EventDate, Tickets, Total) VALUES ('Barrack Obama', 'Dallas-Game 1', '2021-01-13', '4', '200.00');
SELECT * FROM tbTickets;

-- -------------------------------------------------------------------
-- Restore saved MySQL settings
-- -------------------------------------------------------------------
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
