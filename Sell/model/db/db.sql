drop database if exists dbquanao;
create database dbquanao;
use dbquanao;
-- account admin
create table account(
    username    varchar(10) primary key,
    password    varchar(10)
);

-- info admin
create table admin(
    username    varchar(10),
    fullname    varchar(20),
    address     varchar(30),
    descript    varchar(100),
    foundday    date,
    constraint foreign key (username) references account(username)
);

-- admin login
create table admin_login(
    ip  varchar(20) primary key,
    logged  boolean
);

-- product
create table product(
    product_id  varchar(5) primary key,
    product_name    varchar(100),
    product_color   varchar(20),
    product_size    varchar(20),
    product_quantity    int,
    product_price   float,
    product_descript    varchar(256) default "Sản phẩm đạt chất lượng hàng đầu trên thị trường",
    product_image   varchar(256) default "none.jpg"
);

