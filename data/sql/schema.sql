CREATE TABLE akce (id BIGINT AUTO_INCREMENT, kategorie_id BIGINT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, perex LONGTEXT, perex_img TEXT, enabled TINYINT(1), zbozi_id BIGINT, platne_od DATETIME, platne_do DATETIME, pocet_kusy BIGINT, gallery_id BIGINT, keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, cena FLOAT(18, 2), mena_id BIGINT, sleva FLOAT(18, 2), popis LONGTEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX akce_sluggable_idx (slug), INDEX kategorie_id_idx (kategorie_id), INDEX gallery_id_idx (gallery_id), INDEX zbozi_id_idx (zbozi_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE ceny (id BIGINT AUTO_INCREMENT, zbozi_id BIGINT NOT NULL, skupina_id BIGINT, zakaznik_id BIGINT, typ VARCHAR(255), dle VARCHAR(255), cena FLOAT(18, 2), mena_id BIGINT, typ_slevy VARCHAR(255), sleva FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX zbozi_id_idx (zbozi_id), INDEX skupina_id_idx (skupina_id), INDEX zakaznik_id_idx (zakaznik_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE cislo_obj (id BIGINT AUTO_INCREMENT, title VARCHAR(32), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE d_p_h (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, sazba BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX d_p_h_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE dodavatel (id BIGINT AUTO_INCREMENT, mena_id BIGINT, jmeno VARCHAR(50), prijmeni VARCHAR(50), organizace VARCHAR(50), ulice VARCHAR(50), psc VARCHAR(6), mesto VARCHAR(50), ico VARCHAR(15), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX dodavatel_sluggable_idx (slug), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE doprava (doprava_id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL, zeme_urceni_id BIGINT NOT NULL, mena_id BIGINT NOT NULL, title VARCHAR(50), celkem FLOAT(18, 2), cena FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX doprava_sluggable_idx (slug), INDEX zeme_urceni_id_idx (zeme_urceni_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(doprava_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE doprava_pobocka (doprava_id BIGINT, pobocka_id BIGINT, PRIMARY KEY(doprava_id, pobocka_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE faktura (id BIGINT AUTO_INCREMENT, faktura_obj_id BIGINT UNIQUE NOT NULL, stav VARCHAR(255), sleva FLOAT(18, 2), celkem_dopl FLOAT(18, 2), celkem FLOAT(18, 2), mena_id BIGINT, zakaznik_id BIGINT NOT NULL, objednavka_id BIGINT, doprava_id BIGINT, platba_id BIGINT, pobocka_id BIGINT, splatnost DATE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX faktura_sluggable_idx (slug), INDEX faktura_obj_id_idx (faktura_obj_id), INDEX mena_id_idx (mena_id), INDEX zakaznik_id_idx (zakaznik_id), INDEX doprava_id_idx (doprava_id), INDEX platba_id_idx (platba_id), INDEX pobocka_id_idx (pobocka_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE faktura_obj (id BIGINT, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE gallery (id BIGINT AUTO_INCREMENT, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, keywords VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE gallery_image (id BIGINT AUTO_INCREMENT, gallery_id bigint(20) NOT NULL, is_active TINYINT(1) DEFAULT '1' NOT NULL, path VARCHAR(255) NOT NULL, alt VARCHAR(60) NOT NULL, title VARCHAR(100), ord BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX gallery_id_idx (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE kategorie (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, parent_id BIGINT, popis LONGTEXT, poradi BIGINT, enabled TINYINT(1), pozice VARCHAR(255), typ VARCHAR(255), keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX kategorie_sluggable_idx (slug), INDEX parent_id_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE kosik (id BIGINT AUTO_INCREMENT, session_id VARCHAR(32), zakaznik_id BIGINT, zbozi_id BIGINT, mena_id BIGINT, mno FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX zakaznik_id_idx (zakaznik_id), INDEX zbozi_id_idx (zbozi_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE mena (id BIGINT AUTO_INCREMENT, name VARCHAR(50), oznaceni VARCHAR(10) NOT NULL UNIQUE, kurz_url TEXT, last_auto_update DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX mena_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE mena_kurz (id BIGINT AUTO_INCREMENT, vychozi_mena BIGINT, cilova_mena BIGINT, kurz DECIMAL(18, 9), INDEX vychozi_mena_idx (vychozi_mena), INDEX cilova_mena_idx (cilova_mena), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE objednavky (id BIGINT AUTO_INCREMENT, typ VARCHAR(255) DEFAULT 'Přijato', stav VARCHAR(255) DEFAULT 'Nezaplaceno', zakaznik_id BIGINT NOT NULL, doprava_id BIGINT NOT NULL, platba_id BIGINT NOT NULL, pobocka_id BIGINT, sleva FLOAT(18, 2), celkem_dopl FLOAT(18, 2), celkem FLOAT(18, 2), mena_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX objednavky_sluggable_idx (slug), INDEX zakaznik_id_idx (zakaznik_id), INDEX doprava_id_idx (doprava_id), INDEX platba_id_idx (platba_id), INDEX pobocka_id_idx (pobocka_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE objednavky_odeslane (id BIGINT AUTO_INCREMENT, cislo_obj_id BIGINT NOT NULL, stav_id BIGINT NOT NULL, zakaznik_id BIGINT NOT NULL, faktura_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX objednavky_odeslane_sluggable_idx (slug), INDEX cislo_obj_id_idx (cislo_obj_id), INDEX stav_id_idx (stav_id), INDEX zakaznik_id_idx (zakaznik_id), INDEX faktura_id_idx (faktura_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE objednavky_prijata (id BIGINT AUTO_INCREMENT, cislo_obj_id BIGINT NOT NULL, stav_id BIGINT NOT NULL, zakaznik_id BIGINT NOT NULL, faktura_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX objednavky_prijata_sluggable_idx (slug), INDEX cislo_obj_id_idx (cislo_obj_id), INDEX stav_id_idx (stav_id), INDEX zakaznik_id_idx (zakaznik_id), INDEX faktura_id_idx (faktura_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE objednavky_ukoncene (id BIGINT AUTO_INCREMENT, cislo_obj_id BIGINT NOT NULL, stav_id BIGINT NOT NULL, zakaznik_id BIGINT NOT NULL, faktura_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX objednavky_ukoncene_sluggable_idx (slug), INDEX cislo_obj_id_idx (cislo_obj_id), INDEX stav_id_idx (stav_id), INDEX zakaznik_id_idx (zakaznik_id), INDEX faktura_id_idx (faktura_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE pay_pal (id BIGINT AUTO_INCREMENT, requesturl VARCHAR(250) DEFAULT 'https://ibs.rb.cz/RZBOP32/ControllerServlet', shopname VARCHAR(50), creditaccount VARCHAR(50), creditbank VARCHAR(50), mena_id BIGINT NOT NULL, zeme_urceni_id BIGINT NOT NULL, enabled TINYINT(1) DEFAULT '0', img TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX mena_id_idx (mena_id), INDEX zeme_urceni_id_idx (zeme_urceni_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE platba (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL, title VARCHAR(50), mena_id BIGINT NOT NULL, doprava_id BIGINT NOT NULL, celkem FLOAT(18, 2), cena FLOAT(18, 2), system_platby VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX platba_sluggable_idx (slug), INDEX doprava_id_idx (doprava_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE platby (id BIGINT AUTO_INCREMENT, stav VARCHAR(255) DEFAULT 'V procesu', zakaznik_id BIGINT NOT NULL, doprava_id BIGINT NOT NULL, platba_id BIGINT NOT NULL, pobocka_id BIGINT, celkem FLOAT(18, 2), mena_id BIGINT NOT NULL, obj_id BIGINT NOT NULL, hash VARCHAR(32) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX hash_idx (hash(32) ASC), UNIQUE INDEX platby_sluggable_idx (slug), INDEX obj_id_idx (obj_id), INDEX mena_id_idx (mena_id), INDEX zakaznik_id_idx (zakaznik_id), INDEX doprava_id_idx (doprava_id), INDEX platba_id_idx (platba_id), INDEX pobocka_id_idx (pobocka_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE pobocky_doprava (pobocka_id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL, mena_id BIGINT NOT NULL, title VARCHAR(50), celkem FLOAT(18, 2), cena FLOAT(18, 2), adresa LONGTEXT, provozni_doba LONGTEXT, mapa_adresa VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX pobocky_doprava_sluggable_idx (slug), INDEX mena_id_idx (mena_id), PRIMARY KEY(pobocka_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE polozky_fak (id BIGINT AUTO_INCREMENT, faktura_id BIGINT NOT NULL, zbozi_id BIGINT, mno FLOAT(18, 2), cena FLOAT(18, 2), sleva FLOAT(18, 2), mena_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX polozky_fak_sluggable_idx (slug), INDEX faktura_id_idx (faktura_id), INDEX zbozi_id_idx (zbozi_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE polozky_obj (id BIGINT AUTO_INCREMENT, obj_id BIGINT NOT NULL, stav VARCHAR(255), zbozi_id BIGINT NOT NULL, mno FLOAT(18, 2), cena FLOAT(18, 2), sleva FLOAT(18, 2), mena_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX polozky_obj_sluggable_idx (slug), INDEX obj_id_idx (obj_id), INDEX zbozi_id_idx (zbozi_id), INDEX mena_id_idx (mena_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE setting (id BIGINT AUTO_INCREMENT, sitename VARCHAR(50), email VARCHAR(50), email2 VARCHAR(50), tel VARCHAR(50), mobil VARCHAR(50), pracovni_doba LONGTEXT, ulice VARCHAR(100), mesto VARCHAR(100), ga_code VARCHAR(100), google_overeni VARCHAR(255), hlavni_mena BIGINT, vychozi_skupina_id BIGINT NOT NULL, skupina_host_id BIGINT NOT NULL, skupina_vel_id BIGINT NOT NULL, interval_typ VARCHAR(255) DEFAULT 'Den', interval_kontroly_meny BIGINT DEFAULT 1, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX hlavni_mena_idx (hlavni_mena), INDEX vychozi_skupina_id_idx (vychozi_skupina_id), INDEX skupina_host_id_idx (skupina_host_id), INDEX skupina_vel_id_idx (skupina_vel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE skupina (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, popis LONGTEXT, sleva FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX skupina_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE skupna (id BIGINT AUTO_INCREMENT, name VARCHAR(50) UNIQUE, sleva FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX skupna_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE slozeni (slozeni_id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, perex LONGTEXT, perex_img TEXT, img TEXT, popis LONGTEXT, enabled TINYINT(1), keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX slozeni_sluggable_idx (slug), PRIMARY KEY(slozeni_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE slozeni_zbozi (slozeni_id BIGINT, zbozi_id BIGINT, PRIMARY KEY(slozeni_id, zbozi_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_objednavky (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, popis LONGTEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX stav_objednavky_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_prijete_objednavky (id BIGINT AUTO_INCREMENT, name VARCHAR(50) UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX stav_prijete_objednavky_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_odeslane_objednavky_translation (id BIGINT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_odeslane_objednavky (id BIGINT, slug VARCHAR(255), updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX stav_odeslane_objednavky_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_prijete_objednavky_translation (id BIGINT, title VARCHAR(50), popis LONGTEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_ukoncene_objednavky_translation (id BIGINT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stav_ukoncene_objednavky (id BIGINT, slug VARCHAR(255), updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX stav_ukoncene_objednavky_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE stranky (id BIGINT AUTO_INCREMENT, kategorie_id BIGINT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, gallery_id BIGINT, perex LONGTEXT, popis LONGTEXT, enabled TINYINT(1), is_homepage TINYINT(1), keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX stranky_sluggable_idx (slug), INDEX kategorie_id_idx (kategorie_id), INDEX gallery_id_idx (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE web_pay (id BIGINT AUTO_INCREMENT, requesturl VARCHAR(250) DEFAULT 'https://3dsecure.exemple.com/order.do', merchantnumber VARCHAR(50), publickey VARCHAR(255), privatekey VARCHAR(255), heslo VARCHAR(7), lastordernum BIGINT DEFAULT 1, mena_id BIGINT NOT NULL, zeme_urceni_id BIGINT NOT NULL, enabled TINYINT(1) DEFAULT '0', img TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX mena_id_idx (mena_id), INDEX zeme_urceni_id_idx (zeme_urceni_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE zakaznik (id BIGINT AUTO_INCREMENT, username VARCHAR(50) NOT NULL UNIQUE, email VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(128) NOT NULL, skupina_id BIGINT, mena_id BIGINT, jmeno VARCHAR(50), prijmeni VARCHAR(50), organizace VARCHAR(50), ulice VARCHAR(50), psc VARCHAR(6), mesto VARCHAR(50), dorucit_id BIGINT, ico VARCHAR(15), jmeno_ico VARCHAR(50), prijmeni_ico VARCHAR(50), organizace_ico VARCHAR(50), ulice_ico VARCHAR(50), psc_ico VARCHAR(6), mesto_ico VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX zakaznik_sluggable_idx (slug), INDEX skupina_id_idx (skupina_id), INDEX mena_id_idx (mena_id), INDEX dorucit_id_idx (dorucit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE zaokrouhleni (id BIGINT AUTO_INCREMENT, name VARCHAR(50), metoda VARCHAR(255), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE zbozi (zbozi_id BIGINT AUTO_INCREMENT, kategorie_id BIGINT, name VARCHAR(50) NOT NULL UNIQUE, title VARCHAR(50) NOT NULL, perex LONGTEXT, perex_img TEXT, nazev_img TEXT, baleni VARCHAR(40), enabled TINYINT(1), gallery_id BIGINT, keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, cena FLOAT(18, 2), dph_id BIGINT, mena_id BIGINT, popis LONGTEXT, skladem FLOAT(18, 2), min_mno FLOAT(18, 2) DEFAULT 1, dodavatel_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX zbozi_sluggable_idx (slug), INDEX kategorie_id_idx (kategorie_id), INDEX gallery_id_idx (gallery_id), INDEX mena_id_idx (mena_id), INDEX dph_id_idx (dph_id), INDEX dodavatel_id_idx (dodavatel_id), PRIMARY KEY(zbozi_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE zeme_urceni (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL, title VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX zeme_urceni_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE e_platba (id BIGINT AUTO_INCREMENT, requesturl VARCHAR(250) DEFAULT 'https://ibs.rb.cz/RZBOP32/ControllerServlet', shopname VARCHAR(50), creditaccount VARCHAR(50), creditbank VARCHAR(50), mena_id BIGINT NOT NULL, zeme_urceni_id BIGINT NOT NULL, enabled TINYINT(1) DEFAULT '0', img TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX mena_id_idx (mena_id), INDEX zeme_urceni_id_idx (zeme_urceni_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ENGINE = INNODB;
ALTER TABLE akce ADD CONSTRAINT akce_zbozi_id_zbozi_zbozi_id FOREIGN KEY (zbozi_id) REFERENCES zbozi(zbozi_id);
ALTER TABLE akce ADD CONSTRAINT akce_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE akce ADD CONSTRAINT akce_kategorie_id_kategorie_id FOREIGN KEY (kategorie_id) REFERENCES kategorie(id);
ALTER TABLE akce ADD CONSTRAINT akce_gallery_id_gallery_id FOREIGN KEY (gallery_id) REFERENCES gallery(id);
ALTER TABLE ceny ADD CONSTRAINT ceny_zbozi_id_zbozi_zbozi_id FOREIGN KEY (zbozi_id) REFERENCES zbozi(zbozi_id);
ALTER TABLE ceny ADD CONSTRAINT ceny_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id);
ALTER TABLE ceny ADD CONSTRAINT ceny_skupina_id_skupina_id FOREIGN KEY (skupina_id) REFERENCES skupina(id);
ALTER TABLE ceny ADD CONSTRAINT ceny_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE dodavatel ADD CONSTRAINT dodavatel_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id) ON DELETE CASCADE;
ALTER TABLE doprava ADD CONSTRAINT doprava_zeme_urceni_id_zeme_urceni_id FOREIGN KEY (zeme_urceni_id) REFERENCES zeme_urceni(id);
ALTER TABLE doprava ADD CONSTRAINT doprava_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE doprava_pobocka ADD CONSTRAINT doprava_pobocka_pobocka_id_pobocky_doprava_pobocka_id FOREIGN KEY (pobocka_id) REFERENCES pobocky_doprava(pobocka_id);
ALTER TABLE doprava_pobocka ADD CONSTRAINT doprava_pobocka_doprava_id_doprava_doprava_id FOREIGN KEY (doprava_id) REFERENCES doprava(doprava_id);
ALTER TABLE faktura ADD CONSTRAINT faktura_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id) ON DELETE CASCADE;
ALTER TABLE faktura ADD CONSTRAINT faktura_pobocka_id_pobocky_doprava_pobocka_id FOREIGN KEY (pobocka_id) REFERENCES pobocky_doprava(pobocka_id);
ALTER TABLE faktura ADD CONSTRAINT faktura_platba_id_platba_id FOREIGN KEY (platba_id) REFERENCES platba(id);
ALTER TABLE faktura ADD CONSTRAINT faktura_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE faktura ADD CONSTRAINT faktura_faktura_obj_id_faktura_obj_id FOREIGN KEY (faktura_obj_id) REFERENCES faktura_obj(id);
ALTER TABLE faktura ADD CONSTRAINT faktura_doprava_id_doprava_doprava_id FOREIGN KEY (doprava_id) REFERENCES doprava(doprava_id);
ALTER TABLE gallery_image ADD CONSTRAINT gallery_image_gallery_id_gallery_id FOREIGN KEY (gallery_id) REFERENCES gallery(id) ON DELETE CASCADE;
ALTER TABLE kategorie ADD CONSTRAINT kategorie_parent_id_kategorie_id FOREIGN KEY (parent_id) REFERENCES kategorie(id);
ALTER TABLE kosik ADD CONSTRAINT kosik_zbozi_id_zbozi_zbozi_id FOREIGN KEY (zbozi_id) REFERENCES zbozi(zbozi_id);
ALTER TABLE kosik ADD CONSTRAINT kosik_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id);
ALTER TABLE kosik ADD CONSTRAINT kosik_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE mena_kurz ADD CONSTRAINT mena_kurz_vychozi_mena_mena_id FOREIGN KEY (vychozi_mena) REFERENCES mena(id);
ALTER TABLE mena_kurz ADD CONSTRAINT mena_kurz_cilova_mena_mena_id FOREIGN KEY (cilova_mena) REFERENCES mena(id);
ALTER TABLE objednavky ADD CONSTRAINT objednavky_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id);
ALTER TABLE objednavky ADD CONSTRAINT objednavky_pobocka_id_pobocky_doprava_pobocka_id FOREIGN KEY (pobocka_id) REFERENCES pobocky_doprava(pobocka_id);
ALTER TABLE objednavky ADD CONSTRAINT objednavky_platba_id_platba_id FOREIGN KEY (platba_id) REFERENCES platba(id);
ALTER TABLE objednavky ADD CONSTRAINT objednavky_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE objednavky ADD CONSTRAINT objednavky_doprava_id_doprava_doprava_id FOREIGN KEY (doprava_id) REFERENCES doprava(doprava_id);
ALTER TABLE objednavky_odeslane ADD CONSTRAINT objednavky_odeslane_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id) ON DELETE CASCADE;
ALTER TABLE objednavky_odeslane ADD CONSTRAINT objednavky_odeslane_stav_id_stav_objednavky_id FOREIGN KEY (stav_id) REFERENCES stav_objednavky(id) ON DELETE CASCADE;
ALTER TABLE objednavky_odeslane ADD CONSTRAINT objednavky_odeslane_faktura_id_faktura_id FOREIGN KEY (faktura_id) REFERENCES faktura(id);
ALTER TABLE objednavky_odeslane ADD CONSTRAINT objednavky_odeslane_cislo_obj_id_cislo_obj_id FOREIGN KEY (cislo_obj_id) REFERENCES cislo_obj(id) ON DELETE CASCADE;
ALTER TABLE objednavky_prijata ADD CONSTRAINT objednavky_prijata_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id) ON DELETE CASCADE;
ALTER TABLE objednavky_prijata ADD CONSTRAINT objednavky_prijata_stav_id_stav_objednavky_id FOREIGN KEY (stav_id) REFERENCES stav_objednavky(id) ON DELETE CASCADE;
ALTER TABLE objednavky_prijata ADD CONSTRAINT objednavky_prijata_faktura_id_faktura_id FOREIGN KEY (faktura_id) REFERENCES faktura(id);
ALTER TABLE objednavky_prijata ADD CONSTRAINT objednavky_prijata_cislo_obj_id_cislo_obj_id FOREIGN KEY (cislo_obj_id) REFERENCES cislo_obj(id) ON DELETE CASCADE;
ALTER TABLE objednavky_ukoncene ADD CONSTRAINT objednavky_ukoncene_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id) ON DELETE CASCADE;
ALTER TABLE objednavky_ukoncene ADD CONSTRAINT objednavky_ukoncene_stav_id_stav_objednavky_id FOREIGN KEY (stav_id) REFERENCES stav_objednavky(id) ON DELETE CASCADE;
ALTER TABLE objednavky_ukoncene ADD CONSTRAINT objednavky_ukoncene_faktura_id_faktura_id FOREIGN KEY (faktura_id) REFERENCES faktura(id);
ALTER TABLE objednavky_ukoncene ADD CONSTRAINT objednavky_ukoncene_cislo_obj_id_cislo_obj_id FOREIGN KEY (cislo_obj_id) REFERENCES cislo_obj(id) ON DELETE CASCADE;
ALTER TABLE pay_pal ADD CONSTRAINT pay_pal_zeme_urceni_id_zeme_urceni_id FOREIGN KEY (zeme_urceni_id) REFERENCES zeme_urceni(id);
ALTER TABLE pay_pal ADD CONSTRAINT pay_pal_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE platba ADD CONSTRAINT platba_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE platba ADD CONSTRAINT platba_doprava_id_doprava_doprava_id FOREIGN KEY (doprava_id) REFERENCES doprava(doprava_id);
ALTER TABLE platby ADD CONSTRAINT platby_zakaznik_id_zakaznik_id FOREIGN KEY (zakaznik_id) REFERENCES zakaznik(id);
ALTER TABLE platby ADD CONSTRAINT platby_pobocka_id_pobocky_doprava_pobocka_id FOREIGN KEY (pobocka_id) REFERENCES pobocky_doprava(pobocka_id);
ALTER TABLE platby ADD CONSTRAINT platby_platba_id_platba_id FOREIGN KEY (platba_id) REFERENCES platba(id);
ALTER TABLE platby ADD CONSTRAINT platby_obj_id_objednavky_id FOREIGN KEY (obj_id) REFERENCES objednavky(id);
ALTER TABLE platby ADD CONSTRAINT platby_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE platby ADD CONSTRAINT platby_doprava_id_doprava_doprava_id FOREIGN KEY (doprava_id) REFERENCES doprava(doprava_id);
ALTER TABLE pobocky_doprava ADD CONSTRAINT pobocky_doprava_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE polozky_fak ADD CONSTRAINT polozky_fak_zbozi_id_zbozi_zbozi_id FOREIGN KEY (zbozi_id) REFERENCES zbozi(zbozi_id);
ALTER TABLE polozky_fak ADD CONSTRAINT polozky_fak_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE polozky_fak ADD CONSTRAINT polozky_fak_faktura_id_faktura_id FOREIGN KEY (faktura_id) REFERENCES faktura(id);
ALTER TABLE polozky_obj ADD CONSTRAINT polozky_obj_zbozi_id_zbozi_zbozi_id FOREIGN KEY (zbozi_id) REFERENCES zbozi(zbozi_id);
ALTER TABLE polozky_obj ADD CONSTRAINT polozky_obj_obj_id_objednavky_id FOREIGN KEY (obj_id) REFERENCES objednavky(id);
ALTER TABLE polozky_obj ADD CONSTRAINT polozky_obj_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE setting ADD CONSTRAINT setting_vychozi_skupina_id_skupina_id FOREIGN KEY (vychozi_skupina_id) REFERENCES skupina(id);
ALTER TABLE setting ADD CONSTRAINT setting_skupina_vel_id_skupina_id FOREIGN KEY (skupina_vel_id) REFERENCES skupina(id);
ALTER TABLE setting ADD CONSTRAINT setting_skupina_host_id_skupina_id FOREIGN KEY (skupina_host_id) REFERENCES skupina(id);
ALTER TABLE setting ADD CONSTRAINT setting_hlavni_mena_mena_id FOREIGN KEY (hlavni_mena) REFERENCES mena(id);
ALTER TABLE slozeni_zbozi ADD CONSTRAINT slozeni_zbozi_zbozi_id_slozeni_slozeni_id FOREIGN KEY (zbozi_id) REFERENCES slozeni(slozeni_id);
ALTER TABLE slozeni_zbozi ADD CONSTRAINT slozeni_zbozi_slozeni_id_zbozi_zbozi_id FOREIGN KEY (slozeni_id) REFERENCES zbozi(zbozi_id);
ALTER TABLE stav_odeslane_objednavky_translation ADD CONSTRAINT sisi_2 FOREIGN KEY (id) REFERENCES stav_odeslane_objednavky(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE stav_prijete_objednavky_translation ADD CONSTRAINT sisi_3 FOREIGN KEY (id) REFERENCES stav_prijete_objednavky(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE stav_ukoncene_objednavky_translation ADD CONSTRAINT sisi_5 FOREIGN KEY (id) REFERENCES stav_ukoncene_objednavky(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE stranky ADD CONSTRAINT stranky_kategorie_id_kategorie_id FOREIGN KEY (kategorie_id) REFERENCES kategorie(id);
ALTER TABLE stranky ADD CONSTRAINT stranky_gallery_id_gallery_id FOREIGN KEY (gallery_id) REFERENCES gallery(id);
ALTER TABLE web_pay ADD CONSTRAINT web_pay_zeme_urceni_id_zeme_urceni_id FOREIGN KEY (zeme_urceni_id) REFERENCES zeme_urceni(id);
ALTER TABLE web_pay ADD CONSTRAINT web_pay_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE zakaznik ADD CONSTRAINT zakaznik_skupina_id_skupina_id FOREIGN KEY (skupina_id) REFERENCES skupina(id) ON DELETE CASCADE;
ALTER TABLE zakaznik ADD CONSTRAINT zakaznik_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id) ON DELETE CASCADE;
ALTER TABLE zakaznik ADD CONSTRAINT zakaznik_dorucit_id_zeme_urceni_id FOREIGN KEY (dorucit_id) REFERENCES zeme_urceni(id);
ALTER TABLE zbozi ADD CONSTRAINT zbozi_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE zbozi ADD CONSTRAINT zbozi_kategorie_id_kategorie_id FOREIGN KEY (kategorie_id) REFERENCES kategorie(id);
ALTER TABLE zbozi ADD CONSTRAINT zbozi_gallery_id_gallery_id FOREIGN KEY (gallery_id) REFERENCES gallery(id);
ALTER TABLE zbozi ADD CONSTRAINT zbozi_dph_id_d_p_h_id FOREIGN KEY (dph_id) REFERENCES d_p_h(id);
ALTER TABLE zbozi ADD CONSTRAINT zbozi_dodavatel_id_dodavatel_id FOREIGN KEY (dodavatel_id) REFERENCES dodavatel(id);
ALTER TABLE e_platba ADD CONSTRAINT e_platba_zeme_urceni_id_zeme_urceni_id FOREIGN KEY (zeme_urceni_id) REFERENCES zeme_urceni(id);
ALTER TABLE e_platba ADD CONSTRAINT e_platba_mena_id_mena_id FOREIGN KEY (mena_id) REFERENCES mena(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
