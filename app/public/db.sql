CREATE DATABASE `movieworld`;

CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`fullname` VARCHAR(240) NOT NULL,
	`username` VARCHAR(240) NOT NULL,
	`password` VARCHAR(240) NOT NULL,
	`created` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updated` DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
);

CREATE TABLE `movies` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(240) NOT NULL,
	`description` VARCHAR(240) NOT NULL,
    `user_id` INT NOT NULL,
	`created` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updated` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `ratings` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`rating` INT NOT NULL,
	`user_id` INT NOT NULL,
	`movie_id` INT NOT NULL,
	`created` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updated` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies (id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (`id`)
);

-- User Sample

INSERT INTO `users` (`fullname`, `username`, `password`) VALUES ('Andreas Christopoulos', 'achristopoulos', '$2y$10$RuSdDZwAdmL7wRtCqRxZQOdo06VXBqm3osX8RyKn1qps9EH3Rzste');
INSERT INTO `users` (`fullname`, `username`, `password`) VALUES ('George Christopoulos', 'gchristopoulos', '$2y$10$RuSdDZwAdmL7wRtCqRxZQOdo06VXBqm3osX8RyKn1qps9EH3Rzste');
INSERT INTO `users` (`fullname`, `username`, `password`) VALUES ('Maridina Christopoulos', 'mchristopoulos', '$2y$10$RuSdDZwAdmL7wRtCqRxZQOdo06VXBqm3osX8RyKn1qps9EH3Rzste');
INSERT INTO `users` (`fullname`, `username`, `password`) VALUES ('George Papidas', 'gpapidas', '$2y$10$RuSdDZwAdmL7wRtCqRxZQOdo06VXBqm3osX8RyKn1qps9EH3Rzste');
INSERT INTO `users` (`fullname`, `username`, `password`) VALUES ('Fotis Oikonomou', 'foikonomou', '$2y$10$RuSdDZwAdmL7wRtCqRxZQOdo06VXBqm3osX8RyKn1qps9EH3Rzste');
INSERT INTO `users` (`fullname`, `username`, `password`) VALUES ('Apostolis Mparsinikas', 'amparsinikas', '$2y$10$RuSdDZwAdmL7wRtCqRxZQOdo06VXBqm3osX8RyKn1qps9EH3Rzste');

-- Movie Sample

INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The 400 Blows ', 'A young boy, left without attention, delves into a life of petty crime.', 1);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('La Haine', '24 hours in the lives of three young men in the French suburbs the day after a violent riot.', 1);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The Godfather', 'The Godfather follows Vito Corleone Don of the Corleone family as he passes the mantel to his son Michael', 1);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The Godfather: Part II', 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.', 1);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Man Bites Dog', 'A film crew follows a ruthless thief and heartless killer as he goes about his daily routine. But complications set in when the film crew lose their objectivity and begin lending a hand.', 2);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The Departed', 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.', 2);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 2);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The Dark Knight ', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 3);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Fight Club ', 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.', 4);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Batman Begins', 'After training with his mentor, Batman begins his fight to free crime-ridden Gotham City from corruption.', 5);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Gladiator ', 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.', 3);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Saving Private Ryan', 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.', 3);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('American History X ', 'A former neo-nazi skinhead tries to prevent his younger brother from going down the same wrong path that he did.', 3);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Limitless', 'With the help of a mysterious pill that enables the user to access 100% of his brains abilities, a struggling writer becomes a financial wizard, but it also puts him in a new world with many dangers.', 2);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 2);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Star Trek', 'The brash James T. Kirk tries to live up to his fathers legacy with Mr. Spock keeping him in check as a vengeful Romulan from the future creates black holes to destroy the Federation one planet at a time.', 1);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('The Town', 'A proficient group of thieves rob a bank and hold Claire, the assistant manager, hostage. Things begin to get complicated when one of the crew members falls in love with Claire.', 4);
INSERT INTO `movies` (`title`, `description`, `user_id`) VALUES ('Heat', 'A group of high-end professional thieves start to feel the heat from the LAPD when they unknowingly leave a clue at their latest heist.', 5);

-- Rating Sample

INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,2,1);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,3,1);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,4,1);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,5,1);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,1);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,1,2);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,3,2);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,4,2);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,5,2);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,2);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,1,3);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,2,3);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,4,3);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,5,3);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,3);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,4);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,5);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,6);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,7);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,14);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,15);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,16);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,17);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,18);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,19);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,20);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,21);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,22);
INSERT INTO `ratings` (`rating`, `user_id`, `movie_id`) VALUES (1,6,23);


