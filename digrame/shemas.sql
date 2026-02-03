create table users (
    id serial primary key not null,
    nom varchar(255)not null,
    prenom varchar (255)not null,
    age int not null,
    date_naissance date not null,
    roles role not null,
    cin varchar(200)not null,
    email varchar (255) unique not nul,
    passwd varchar (255),
    telephone int
)
create type role (
    admin,
    teacher,
    student,
)