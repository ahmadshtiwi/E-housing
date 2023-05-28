create table accounts
(
    id_person INT AUTO_INCREMENT primary key ,
    name varchar(255) not null ,  
    username varchar(255) not null unique ,
    password varchar(255) not null,
    birthday varchar(50)  ,
    gender varchar(50)  ,
    phone varchar(10)   ,
    city varchar(255)  ,
    type_account varchar(10),
    image varchar(255)
)

create table designs
(
    id_design INT AUTO_INCREMENT,
    price INT,
    area INT,
    bed_room INT,
    kids_room INT,
    gust_room varchar(10),
    living_room varchar(10),
    bathroom int ,
    balcony int ,
    kitchen int ,
    garage int,
    city varchar(50),
    garden INT,
    image_design varchar(255),
    id_person INT,
    PRIMARY KEY(id_design)
)

