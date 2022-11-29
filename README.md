# SimpleAuth-PHP
Just a simple login and registration system made with php.

<p align='center'>
  <img align="center" src="https://media.discordapp.net/attachments/1042270745377652851/1047043881293856788/image.png" />
</p>

```py
CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

------------------------------------------

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

------------------------------------------

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
