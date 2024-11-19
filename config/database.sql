create database login;

use login;


create table usuario(
	id int primary key auto_increment,
    nome varchar(150),
    data_nasc date,
    email varchar(150),
    endereco varchar(200),
    senha varchar(100)
);

select * from usuario;