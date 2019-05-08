--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.6
-- Dumped by pg_dump version 9.6.6

-- Started on 2019-05-08 08:36:51

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2173 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 187 (class 1259 OID 41100)
-- Name: administrateur; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE administrateur (
    id_administrateur integer NOT NULL,
    login character varying(60) NOT NULL,
    mot_de_passe character varying(64) NOT NULL
);


ALTER TABLE administrateur OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 41098)
-- Name: administrateur_id_administrateur_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE administrateur_id_administrateur_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE administrateur_id_administrateur_seq OWNER TO postgres;

--
-- TOC entry 2174 (class 0 OID 0)
-- Dependencies: 186
-- Name: administrateur_id_administrateur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE administrateur_id_administrateur_seq OWNED BY administrateur.id_administrateur;


--
-- TOC entry 189 (class 1259 OID 41108)
-- Name: categorie; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE categorie (
    id_categorie integer NOT NULL,
    nom_categorie character varying(50) NOT NULL
);


ALTER TABLE categorie OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 41106)
-- Name: categorie_id_categorie_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categorie_id_categorie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categorie_id_categorie_seq OWNER TO postgres;

--
-- TOC entry 2175 (class 0 OID 0)
-- Dependencies: 188
-- Name: categorie_id_categorie_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categorie_id_categorie_seq OWNED BY categorie.id_categorie;


--
-- TOC entry 193 (class 1259 OID 41133)
-- Name: images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE images (
    id_image integer NOT NULL,
    id_livre integer NOT NULL,
    nom_image text NOT NULL,
    description text NOT NULL
);


ALTER TABLE images OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 41131)
-- Name: images_id_image_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE images_id_image_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE images_id_image_seq OWNER TO postgres;

--
-- TOC entry 2176 (class 0 OID 0)
-- Dependencies: 192
-- Name: images_id_image_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE images_id_image_seq OWNED BY images.id_image;


--
-- TOC entry 191 (class 1259 OID 41116)
-- Name: livre; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE livre (
    id_livre integer NOT NULL,
    id_categorie integer NOT NULL,
    titre character varying(100) NOT NULL,
    resume text NOT NULL,
    auteur character varying(50) NOT NULL
);


ALTER TABLE livre OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 41114)
-- Name: livre_id_livre_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE livre_id_livre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE livre_id_livre_seq OWNER TO postgres;

--
-- TOC entry 2177 (class 0 OID 0)
-- Dependencies: 190
-- Name: livre_id_livre_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE livre_id_livre_seq OWNED BY livre.id_livre;


--
-- TOC entry 185 (class 1259 OID 41093)
-- Name: migration_versions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migration_versions (
    version character varying(14) NOT NULL,
    executed_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE migration_versions OWNER TO postgres;

--
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 185
-- Name: COLUMN migration_versions.executed_at; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN migration_versions.executed_at IS '(DC2Type:datetime_immutable)';


--
-- TOC entry 2025 (class 2604 OID 41103)
-- Name: administrateur id_administrateur; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administrateur ALTER COLUMN id_administrateur SET DEFAULT nextval('administrateur_id_administrateur_seq'::regclass);


--
-- TOC entry 2026 (class 2604 OID 41111)
-- Name: categorie id_categorie; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorie ALTER COLUMN id_categorie SET DEFAULT nextval('categorie_id_categorie_seq'::regclass);


--
-- TOC entry 2028 (class 2604 OID 41136)
-- Name: images id_image; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY images ALTER COLUMN id_image SET DEFAULT nextval('images_id_image_seq'::regclass);


--
-- TOC entry 2027 (class 2604 OID 41128)
-- Name: livre id_livre; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY livre ALTER COLUMN id_livre SET DEFAULT nextval('livre_id_livre_seq'::regclass);


--
-- TOC entry 2160 (class 0 OID 41100)
-- Dependencies: 187
-- Data for Name: administrateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY administrateur (id_administrateur, login, mot_de_passe) FROM stdin;
7	Kenny	USwayVNCLQPWCzpSzEGgI6RpzhE=
8	Admin1	USwayVNCLQPWCzpSzEGgI6RpzhE=
\.


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 186
-- Name: administrateur_id_administrateur_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('administrateur_id_administrateur_seq', 8, true);


--
-- TOC entry 2162 (class 0 OID 41108)
-- Dependencies: 189
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categorie (id_categorie, nom_categorie) FROM stdin;
1	Education
2	Roman
3	Jeunesse
\.


--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 188
-- Name: categorie_id_categorie_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categorie_id_categorie_seq', 4, true);


--
-- TOC entry 2166 (class 0 OID 41133)
-- Dependencies: 193
-- Data for Name: images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY images (id_image, id_livre, nom_image, description) FROM stdin;
1	1	Harry Potter et la Pierre Philosophale1.jpg	Couverture du livre Harry Potter et la Pierre Philosophiale
2	1	Harry Potter et la Pierre Philosophale2.jpg	Harry Potter et la Pierre Philosophiale avec les lunettes de Harry Potter
3	9	Quand nos souvenirs viendront danser1.jpg	Quand nos souvenirs viendront danser
4	9	Quand nos souvenirs viendront danser2.jpg	Quand nos souvenirs viendront danser
5	9	Quand nos souvenirs viendront danser3.jpg	Quand nos souvenirs viendront danser
6	1	Harry Potter et la Pierre Philosophale3.jpg	Harry Potter et la Pierre Philosophale
\.


--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 192
-- Name: images_id_image_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('images_id_image_seq', 6, true);


--
-- TOC entry 2164 (class 0 OID 41116)
-- Dependencies: 191
-- Data for Name: livre; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY livre (id_livre, id_categorie, titre, resume, auteur) FROM stdin;
1	3	Harry Potter et la Pierre Philosophale	<strong>Harry Potter</strong> est un garçon de 11 ans. \nIl est orphelin et vit chez sa Tante Pétunia et son Oncle Vernon, avec son cousin Dudley.\n Tous trois sont excécrables avec <strong>Harry</strong>, qu"ils ne désiraient pas voir entrer dans leur vie. \n Surtout que des choses étranges se produisent parfois en sa présence. \n Mais un jour, une lettre arrive pour <strong>Harry</strong> et un géant vient le chercher. \n Il doit entrer à Hogwarts, l"école de magie. \n <strong>Harry Potter</strong> découvre qu"il est un <i>sorcier</i> et que ses parents ne sont pas morts dans un accident de voiture, comme le lui avaient dit Tante Pétunia et Oncle Vernon. \n Ils ont été tués par le plus terrible des <i>sorciers</i>, celui-dont-on-ne-doit-pas-prononcer-le-nom, j"ai nommé Voldemort. \n Mais, par un étrange coup du destin, <strong>Harry</strong> a survécu à l"attaque de Voldemort, alors qu"il n"avait qu"un an, et a mis fin de cette façon au règne de ce <i>sorcier</i>.\n  C"est pour cela, que dans le monde des <i>sorciers</i>, <strong>Harry</strong> est une légende, tout le monde connaît son nom et la cicatrice en forme d"éclair qu"il a sur le front. \nAlors qu"il fait sa rentrée à Hogwarts, <strong>Harry</strong> rentre dans la maison Gryffindor avec ses amis, Ron et Hermione, mais il se fait des ennemis dans la maison Slytherin,\n réputée pour avoir formé les suivants de Voldemort. \nCette première année sera remplie de découvertes pour notre héros, mais aussi d"aventures plus ou moins dangereuses, et il se verra affronter son ennemi ultime,\n Voldemort, qui tente de s"emparer de l"elixir de la vie éternelle, la </strong>Pierre Philosophale</strong>...	J.K. ROWLING
9	2	Quand nos souvenirs viendront danser	Lorsque nous avons emménagé impasse des Colibris, nous avions vingt ans, ça sentait la peinture fraîche et les projets, nous nous prêtions main-forte entre voisins en traversant les jardins non clôturés.\r\n\r\nSoixante-trois ans plus tard, les haies ont poussé, nos souvenirs sont accrochés aux murs et nous ne nous adressons la parole qu"en cas de nécessité absolue. Nous ne sommes plus que six : Anatole, Joséphine, Marius, Rosalie, Gustave et moi, Marceline.\r\n\r\nQuand le maire annonce qu"il va raser l"impasse – nos maisons, nos mémoires, nos vies –, nous oublions le passé pour nous allier et nous battre. Tous les coups sont permis : nous n"avons plus rien à perdre, et c"est plus excitant qu"une sieste devant Motus. »\r\n\r\nÀ travers le récit de leur combat et une plongée dans ses souvenirs, Marceline raconte une magnifique histoire d"amour, les secrets de toute une famille et la force des liens qui tissent une amitié.\r\n\r\nUn roman émouvant et plein d"humour sur le temps qui passe et la place des souvenirs	Virginie Grimaldi
\.


--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 190
-- Name: livre_id_livre_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('livre_id_livre_seq', 9, true);


--
-- TOC entry 2158 (class 0 OID 41093)
-- Dependencies: 185
-- Data for Name: migration_versions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migration_versions (version, executed_at) FROM stdin;
\.


--
-- TOC entry 2032 (class 2606 OID 41105)
-- Name: administrateur administrateur_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administrateur
    ADD CONSTRAINT administrateur_pkey PRIMARY KEY (id_administrateur);


--
-- TOC entry 2034 (class 2606 OID 41113)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_categorie);


--
-- TOC entry 2038 (class 2606 OID 41141)
-- Name: images images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY images
    ADD CONSTRAINT images_pkey PRIMARY KEY (id_image);


--
-- TOC entry 2036 (class 2606 OID 41130)
-- Name: livre livre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY livre
    ADD CONSTRAINT livre_pkey PRIMARY KEY (id_livre);


--
-- TOC entry 2030 (class 2606 OID 41097)
-- Name: migration_versions migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migration_versions
    ADD CONSTRAINT migration_versions_pkey PRIMARY KEY (version);


--
-- TOC entry 2040 (class 2606 OID 41142)
-- Name: images fk_image_livre; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY images
    ADD CONSTRAINT fk_image_livre FOREIGN KEY (id_livre) REFERENCES livre(id_livre);


--
-- TOC entry 2039 (class 2606 OID 41123)
-- Name: livre fk_livre_categorie; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY livre
    ADD CONSTRAINT fk_livre_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie);


-- Completed on 2019-05-08 08:36:51

--
-- PostgreSQL database dump complete
--

