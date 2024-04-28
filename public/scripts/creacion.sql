create table actors
(
    id          bigint unsigned auto_increment
        primary key,
    nombre      varchar(120)                           not null,
    nombre_real varchar(120)                           null,
    edad        date                                   null,
    defuncion   date                                   null,
    pais        varchar(120) default 'apátrida'        not null,
    creado      timestamp    default CURRENT_TIMESTAMP not null,
    modificado  timestamp    default CURRENT_TIMESTAMP not null
)
    collate = utf8mb4_unicode_ci;

create table directors
(
    id         bigint unsigned auto_increment
        primary key,
    nombre     varchar(123)                           not null,
    edad       date                                   not null,
    defuncion  date                                   null,
    pais       varchar(120) default 'apátrida'        not null,
    creado     timestamp    default CURRENT_TIMESTAMP not null,
    modificado timestamp    default CURRENT_TIMESTAMP not null
)
    collate = utf8mb4_unicode_ci;

create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table generos
(
    id         bigint unsigned auto_increment
        primary key,
    genero     varchar(255)                        not null,
    creado     timestamp default CURRENT_TIMESTAMP not null,
    modificado timestamp default CURRENT_TIMESTAMP not null,
    constraint generos_genero_unique
        unique (genero)
)
    collate = utf8mb4_unicode_ci;

create table medios
(
    id         bigint unsigned auto_increment
        primary key,
    nombre     varchar(120)                        not null,
    web        varchar(200)                        null,
    creado     timestamp default CURRENT_TIMESTAMP not null,
    modificado timestamp default CURRENT_TIMESTAMP not null
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table obras
(
    id              bigint unsigned auto_increment
        primary key,
    titulo          varchar(200)                           not null,
    titulo_original varchar(200)                           not null,
    pais            varchar(60)                            not null,
    duracion        decimal(3)                             not null,
    sinopsis        varchar(2500)                          not null,
    fecha           year                                   not null,
    productora      varchar(255) default '-'               not null,
    creada          timestamp    default CURRENT_TIMESTAMP not null,
    modificada      timestamp    default CURRENT_TIMESTAMP not null,
    constraint obras_titulo_unique
        unique (titulo),
    constraint duracion
        check (`duracion` > 0)
)
    collate = utf8mb4_unicode_ci;

create table actor_obra
(
    obra_id  bigint unsigned not null,
    actor_id bigint unsigned not null,
    constraint actor_obra_obra_id_actor_id_unique
        unique (obra_id, actor_id),
    constraint actor_obra_actor_id_foreign
        foreign key (actor_id) references actors (id)
            on delete cascade,
    constraint actor_obra_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table citas
(
    id      bigint unsigned auto_increment
        primary key,
    obra_id bigint unsigned null,
    cita    varchar(500)    not null,
    tipo    varchar(50)     not null,
    constraint citas_obra_id_foreign
        foreign key (obra_id) references obras (id)
)
    collate = utf8mb4_unicode_ci;

create table director_obra
(
    director_id bigint unsigned not null,
    obra_id     bigint unsigned not null,
    constraint director_obra_director_id_obra_id_unique
        unique (director_id, obra_id),
    constraint director_obra_director_id_foreign
        foreign key (director_id) references directors (id)
            on delete cascade,
    constraint director_obra_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table festivals
(
    id         bigint unsigned auto_increment
        primary key,
    obra_id    bigint unsigned                     not null,
    nombre     varchar(120)                        not null,
    edicion    year                                not null,
    creada     timestamp default CURRENT_TIMESTAMP not null,
    modificada timestamp default CURRENT_TIMESTAMP not null,
    constraint festivals_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table genero_obra
(
    obra_id   bigint unsigned not null,
    genero_id bigint unsigned not null,
    constraint genero_obra_genero_id_obra_id_unique
        unique (genero_id, obra_id),
    constraint genero_obra_genero_id_foreign
        foreign key (genero_id) references generos (id)
            on delete cascade,
    constraint genero_obra_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table password_reset_tokens
(
    email      varchar(255) not null
        primary key,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table posters
(
    obra_id    bigint unsigned                     not null,
    ruta       varchar(255)                        not null,
    alt        varchar(255)                        not null,
    creado     timestamp default CURRENT_TIMESTAMP not null,
    modificado timestamp default CURRENT_TIMESTAMP not null,
    constraint posters_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table profesionals
(
    id         bigint unsigned auto_increment
        primary key,
    obra_id    bigint unsigned                     not null,
    medio_id   bigint unsigned                     null,
    autor      varchar(200)                        not null,
    contenido  varchar(5000)                       not null,
    fecha      date                                null,
    creada     timestamp default CURRENT_TIMESTAMP not null,
    modificada timestamp default CURRENT_TIMESTAMP not null,
    constraint profesionals_medio_id_foreign
        foreign key (medio_id) references medios (id),
    constraint profesionals_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table secuelas
(
    obra_id    bigint unsigned                        not null,
    orden      int unsigned default '0'               not null,
    saga       varchar(255)                           not null,
    creada     timestamp    default CURRENT_TIMESTAMP not null,
    modificada timestamp    default CURRENT_TIMESTAMP not null,
    constraint secuelas_obra_id_orden_unique
        unique (obra_id, orden),
    constraint secuelas_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table trailers
(
    obra_id    bigint unsigned                     not null
        primary key,
    trailers   varchar(500)                        not null,
    creado     timestamp default CURRENT_TIMESTAMP not null,
    modificado timestamp default CURRENT_TIMESTAMP not null,
    constraint trailers_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(53)                            not null,
    username          varchar(33)                            null,
    age               date                                   null,
    country           varchar(73)                            null,
    email             varchar(73)                            not null,
    email_verified_at timestamp                              null,
    password          varchar(253)                           null,
    remember_token    varchar(100)                           null,
    social_id         varchar(255)                           null,
    social_type       varchar(255) default 'filmXtra'        not null,
    created_at        timestamp    default CURRENT_TIMESTAMP not null,
    updated_at        timestamp    default CURRENT_TIMESTAMP not null,
    constraint users_email_social_type_unique
        unique (email, social_type),
    constraint users_social_id_unique
        unique (social_id)
)
    collate = utf8mb4_unicode_ci;

create table criticas
(
    id         bigint unsigned auto_increment
        primary key,
    obra_id    bigint unsigned                     not null,
    user_id    bigint unsigned                     not null,
    critica    varchar(5000)                       not null,
    creada     timestamp default CURRENT_TIMESTAMP not null,
    modificada timestamp default CURRENT_TIMESTAMP not null,
    constraint criticas_obra_id_user_id_unique
        unique (obra_id, user_id),
    constraint criticas_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade,
    constraint criticas_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table evaluaciones
(
    id         bigint unsigned auto_increment
        primary key,
    obra_id    bigint unsigned                     not null,
    user_id    bigint unsigned                     not null,
    evaluacion decimal(3, 1)                       not null,
    creada     timestamp default CURRENT_TIMESTAMP not null,
    modificada timestamp default CURRENT_TIMESTAMP not null,
    constraint evaluaciones_obra_id_user_id_unique
        unique (obra_id, user_id),
    constraint evaluaciones_obra_id_foreign
        foreign key (obra_id) references obras (id)
            on delete cascade,
    constraint evaluaciones_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade,
    constraint evaluacion
        check (`evaluacion` > 0)
)
    collate = utf8mb4_unicode_ci;

create table likes
(
    user_id    bigint unsigned not null,
    critica_id bigint unsigned not null,
    constraint likes_user_id_critica_id_unique
        unique (user_id, critica_id),
    constraint likes_critica_id_foreign
        foreign key (critica_id) references criticas (id)
            on delete cascade,
    constraint likes_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

