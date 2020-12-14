create table users
(
    id          int primary key auto_increment,
    full_name   varchar(50),
    email       varchar(30) unique,
    password    text,
    user_type   int default 0 comment '0 patient, 1 doctor',
    phone       varchar(20),
    bio         text null,
    clinic_info text null,
    experience  text null
);

create table prediction
(
    id       int primary key auto_increment,
    user_id  int,
    age      int,
    sex      varchar(20),
    cp       varchar(100),
    trestbps int,
    chol     int,
    fbs      varchar(100),
    restecg  varchar(100),
    thalach  int,
    exang    varchar(20),
    oldpeak  float,
    slope    varchar(20),
    ca       int,
    thal     varchar(100),
    result   varchar(100),

    constraint foreign key (user_id) references users (id)
        on delete cascade on update cascade
);
