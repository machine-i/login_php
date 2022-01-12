# login_php
A web application designed to authenticate users to restricted content.

<div align="center">
  <img src="https://user-images.githubusercontent.com/68506101/148699925-eb6cfe52-004c-49ef-a9ec-1f43901161cd.png" width="800px">
</div>

To use this application it is necessary to install the XAMPP program. With the program open, the Apache and MySQL module should be started. In your computer's "C:" directory, locate the "xampp" directory. Inside there is a folder called "htdocs", this folder is the public directory of the module "Apache". Transfer the "login_php" folder into the "htdocs" directory.

The "login_php_private" folder should be transferred into the "xampp" directory, at the same level as the "htdocs" folder.

In this way, we increase security, because the files that reveal the business secret are not located in the public directory.

Go to "http://localhost/phpmyadmin/" and create a database called "db_login".

In that database, run the following SQL statement: 
========================================================================================================
CREATE TABLE tb_accounts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  id_profile INT NOT NULL
);

INSERT INTO `tb_accounts` (`email`,`password`,`id_profile`) VALUES ("adm@teste.com.br","1234", 1);
========================================================================================================

On the page "index.php" contains the email and password box.

Enter the e-mail "adm@teste.com.br" and the password "1234" for testing purposes.

Your authentication will then go through an information verification process and if it is correct, you will be redirected to the success screen.
