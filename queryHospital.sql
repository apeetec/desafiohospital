create database hospital;
create table tab_perfil(
per_codigo int primary key auto_increment,
per_descricao varchar(100) not null
);
create table tab_usuario(
usu_codigo int primary key auto_increment,
per_codigo int,
usu_nome varchar(100) not null, 
usu_senha varchar(500),
usu_login_acesso varchar(15),
FOREIGN KEY (per_codigo) REFERENCES tab_perfil(per_codigo)
);

SELECT * FROM tab_perfil;
SELECT * FROM tab_usuario;