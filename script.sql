create table public.user_details
(
    id             serial
        primary key,
    name           varchar(100) not null,
    surname        varchar(100) not null,
    phone_number   varchar(15),
    city           varchar(50),
    street_address varchar(100),
    postal_code    varchar(10),
    user_admin     boolean default false
);

alter table public.user_details
    owner to lib;

create table public.users
(
    id              serial
        primary key,
    email           varchar(255)      not null,
    password        varchar(255)      not null,
    id_user_details integer default 0 not null
        constraint details_users___fk
            references public.user_details
            on update cascade on delete cascade
);

alter table public.users
    owner to lib;

create table public.books
(
    id                serial
        primary key,
    title             varchar(150)      not null,
    author            varchar(100)      not null,
    secondary_authors varchar(200),
    publishing_date   varchar(20)       not null,
    last_user_id      integer default 0 not null
        constraint books_last_user__fk
            references public.users
            on update cascade on delete cascade,
    cover_art         varchar(255)
);

alter table public.books
    owner to lib;

create table public.users_books
(
    id_user integer not null
        constraint book_users_books___fk
            references public.users
            on update cascade on delete cascade,
    id_book integer not null
        constraint book_users_books__fk
            references public.books
            on update cascade on delete cascade
);

alter table public.users_books
    owner to lib;


/*Examples:*/
SELECT * FROM public.books;

SELECT public.users.email, public.books.title
FROM public.users LEFT JOIN public.books ON public.users.id = public.books.last_user_id;

CREATE OR REPLACE VIEW id_mapping AS
SELECT public.user_details.name, public.user_details.surname, public.users.id
FROM public.user_details INNER JOIN public.users ON public.user_details.id = public.users.id_user_details;
SELECT * FROM id_mapping;

CREATE OR REPLACE VIEW reading_history AS
SELECT public.id_mapping.name, public.id_mapping.surname, public.books.author
FROM public.id_mapping
         INNER JOIN public.books on public.id_mapping.id = public.books.last_user_id;
SELECT * FROM reading_history;

DROP FUNCTION  IF EXISTS proc_1;
CREATE FUNCTION  proc_1 (user_id int)
    RETURNS int LANGUAGE plpgsql as $$
    declare
        o_count int;
    begin
        select count(*) into o_count
        from public.books where public.books.last_user_id = user_id;
    return o_count;
    end;
$$;
SELECT proc_1(1);