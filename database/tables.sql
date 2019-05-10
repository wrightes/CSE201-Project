CREATE TABLE `apps` ( `name` VARCHAR(255) NOT NULL , `dev` TINYTEXT NOT NULL , `ps4` BOOLEAN NOT NULL , `xbox1` BOOLEAN NOT NULL , `switch` BOOLEAN NOT NULL , `pc` BOOLEAN NOT NULL , `price` DOUBLE NOT NULL , `link` TEXT NOT NULL, `desc` TEXT NOT NULL);
ALTER TABLE `apps` ADD PRIMARY KEY( `name`);

INSERT INTO `apps` (`name`, `dev`, `ps4`, `xbox1`, `switch`, `pc`, `price`, `link`, `desc`) 
VALUES 
	('Apex Legends', 'Respawn Entertainment', '1', '1', '0', '1', '0', 'https://www.ea.com/games/apex-legends', '--'), 
	('Bloodbourne', 'FromSoftware', '1', '0', '0', '0', '59.99', 'https://www.playstation.com/en-us/games/bloodborne-ps4/', '--'), 
	('Cities: Skyline', 'Paradox Interactive', '1', '1', '0', '1', '39.99', 'https://www.paradoxplaza.com/cities-skylines/CSCS00GSK-MASTER.html', '--'), 
	('God Of War', 'Santa Monica Studios', '1', '0', '0', '0', '59.99', 'https://godofwar.playstation.com/', '--'), 
	('Hollow Knight', 'Team Cherry', '1', '1', '1', '1', '14.99', 'https://hollowknight.com/', '--'), 
	('Overwatch', 'Blizzard Entertainment', '1', '1', '0', '1', '29.99', 'https://playoverwatch.com/en-us/', '--'), 
	('Red Dead Redemption II', 'Rockstar Games', '1', '1', '0', '1', '59.99', 'https://www.rdr2.org/', '--'), 
	('Sekiro: Shadows Die Twice', 'FromSoftware	', '1', '1', '0', '1', '59.99', 'https://www.sekirothegame.com/', '--'), 
	('The Witcher 3: Wild Hunt', 'CD Project Red', '1', '1', '0', '1', '59.99', 'https://thewitcher.com/en/witcher3', '--'), 
	('Stardew Valley', 'ConcernedApe', '1', '1', '1', '1', '14.99', 'https://www.stardewvalley.net/', '--');

CREATE TABLE `users` ( `username` VARCHAR(255) NOT NULL , `password` TINYTEXT NOT NULL , `mod` BOOLEAN NOT NULL, `admin` BOOLEAN NOT NULL);

ALTER TABLE `users` ADD PRIMARY KEY( `username`);

INSERT INTO `users` (`username`, `password`, `mod`, `admin`)
VALUES 	
	('user', '$2y$10$RaQ0tZZQjDBt1Zvt3NT3MONS.Ol1Oq8XwPccU4ieSiCDcUkXf28Jy', '0', '0'),
	('moderator', '$2y$10$RaQ0tZZQjDBt1Zvt3NT3MONS.Ol1Oq8XwPccU4ieSiCDcUkXf28Jy', '1', '0'),
	('admin', '$2y$10$RaQ0tZZQjDBt1Zvt3NT3MONS.Ol1Oq8XwPccU4ieSiCDcUkXf28Jy', '1', '1');

CREATE TABLE `comments` ( `name` TINYTEXT NOT NULL , `comment` TEXT NOT NULL , `user` TINYTEXT NOT NULL , `timestamp` TIMESTAMP NOT NULL, `likes` INT NOT NULL, `dislikes` INT NOT NULL );

CREATE TABLE `request` ( `name` VARCHAR(255) NOT NULL , `dev` TINYTEXT NOT NULL , `ps4` BOOLEAN NOT NULL , `xbox1` BOOLEAN NOT NULL , `switch` BOOLEAN NOT NULL , `pc` BOOLEAN NOT NULL , `price` DOUBLE NOT NULL , `link` TEXT NOT NULL, `desc` TEXT NOT NULL);
ALTER TABLE `request` ADD PRIMARY KEY( `name`);