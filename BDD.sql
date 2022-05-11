CREATE TABLE `users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `user_post` JSON NULL,
    `user_photo` TEXT NULL,
    `bio` VARCHAR(255) NULL
);
CREATE TABLE `Post`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `post_text` LONGTEXT NULL,
    `post_img` TEXT NULL,
    `post_date` DATETIME NOT NULL,
    `page_post` JSON NULL,
    `groupe_post` JSON NULL
);
CREATE TABLE `groupe`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `image` TEXT NULL,
    `banniere` TEXT NULL
);
CREATE TABLE `message`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `modified` LONGTEXT NOT NULL,
    `user_text` LONGTEXT NOT NULL,
    `channel_id` INT UNSIGNED NOT NULL,
    `read` TINYINT(1) NOT NULL,
    `date_mess_user` DATETIME NOT NULL
);
CREATE TABLE `page`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `banniere` TEXT NULL
);
CREATE TABLE `users_groupes`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `user_post` INT NOT NULL,
    `membership` VARCHAR(255) NOT NULL,
    `user_role` VARCHAR(255) NOT NULL,
    `groupe_id` INT UNSIGNED NOT NULL
);
CREATE TABLE `chanel`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `nom` INT NOT NULL
);
CREATE TABLE `assocoation`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `chanel_id` INT UNSIGNED NOT NULL
);
CREATE TABLE `follower`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `follower_id` INT UNSIGNED NOT NULL
);
CREATE TABLE `user_page`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL
);
CREATE TABLE `reaction_like`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `post_id` INT UNSIGNED NULL
);
CREATE TABLE `reaction_comment`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `post_id` INT UNSIGNED NOT NULL,
    `text` LONGTEXT NULL,
    `date` DATETIME NULL
);
ALTER TABLE
    `follower` ADD CONSTRAINT `follower_follower_id_foreign` FOREIGN KEY(`follower_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `Post` ADD CONSTRAINT `post_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `message` ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `message` ADD CONSTRAINT `message_channel_id_foreign` FOREIGN KEY(`channel_id`) REFERENCES `chanel`(`id`);
ALTER TABLE
    `users_groupes` ADD CONSTRAINT `users_groupes_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `users_groupes` ADD CONSTRAINT `users_groupes_groupe_id_foreign` FOREIGN KEY(`groupe_id`) REFERENCES `groupe`(`id`);
ALTER TABLE
    `assocoation` ADD CONSTRAINT `assocoation_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `assocoation` ADD CONSTRAINT `assocoation_chanel_id_foreign` FOREIGN KEY(`chanel_id`) REFERENCES `chanel`(`id`);
ALTER TABLE
    `user_page` ADD CONSTRAINT `user_page_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
ALTER TABLE
    `user_page` ADD CONSTRAINT `user_page_page_id_foreign` FOREIGN KEY(`page_id`) REFERENCES `page`(`id`);
ALTER TABLE
    `follower` ADD CONSTRAINT `follower_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);