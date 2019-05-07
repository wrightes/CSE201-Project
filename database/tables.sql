CREATE TABLE `apps` ( `name` TINYTEXT NOT NULL , `dev` TINYTEXT NOT NULL , `ps4` BOOLEAN NOT NULL , `xbox1` BOOLEAN NOT NULL , `switch` BOOLEAN NOT NULL , `pc` BOOLEAN NOT NULL , `price` DOUBLE NOT NULL , `link` TEXT NOT NULL );

INSERT INTO `apps` (`name`, `dev`, `ps4`, `xbox1`, `switch`, `pc`, `price`, `link`) 
VALUES 
('Apex Legends', 'Respawn Entertainment', '1', '1', '0', '1', '0', 'https://www.ea.com/games/apex-legends'), 
('Bloodbourne', 'FromSoftware', '1', '0', '0', '0', '59.99', 'https://www.playstation.com/en-us/games/bloodborne-ps4/'), 
('Cities: Skyline', 'Paradox Interactive', '1', '1', '0', '1', '39.99', 'https://www.paradoxplaza.com/cities-skylines/CSCS00GSK-MASTER.html'), 
('God Of War', 'Santa Monica Studios', '1', '0', '0', '0', '59.99', 'https://godofwar.playstation.com/'), 
('Hollow Knight', 'Team Cherry', '1', '1', '1', '1', '14.99', 'https://hollowknight.com/'), 
('Overwatch', 'Blizzard Entertainment', '1', '1', '0', '1', '29.99', 'https://playoverwatch.com/en-us/'), 
('Red Dead Redemption II', 'Rockstar Games', '1', '1', '0', '1', '59.99', 'https://www.rdr2.org/'), 
('Sekiro: Shadows Die Twice', 'FromSoftware	', '1', '1', '0', '1', '59.99', 'https://www.sekirothegame.com/'), 
('The Witcher 3: Wild Hunt', 'CD Project Red', '1', '1', '0', '1', '59.99', 'https://thewitcher.com/en/witcher3'), 
('Stardew Valley', 'ConcernedApe', '1', '1', '1', '1', '14.99', 'https://www.stardewvalley.net/');

CREATE TABLE `users` ( `username` VARCHAR(255) NOT NULL , `password` TINYTEXT NOT NULL );
ALTER TABLE `users` ADD PRIMARY KEY( `username`);

CREATE TABLE `comments` ( `name` TINYTEXT NOT NULL , `comment` TEXT NOT NULL , `user` TINYTEXT NOT NULL , `timestamp` TIMESTAMP NOT NULL );