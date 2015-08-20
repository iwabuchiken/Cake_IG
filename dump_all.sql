PRAGMA foreign_keys=OFF;

CREATE TABLE keywords (
	id			INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL,
	created_at	VARCHAR(30),
	updated_at	VARCHAR(30),
	
    word		VARCHAR(30),
    
    genre_id	INTEGER,
    
    type_id		INTEGER,

    memo		VARCHAR(50)
	
);
INSERT INTO "keywords" VALUES(2,'2015-08-10 09:39:34','2015-08-10 09:39:34','犬',NULL,NULL,'');
INSERT INTO "keywords" VALUES(3,'2015-08-10 09:40:57','2015-08-10 09:40:57','車',NULL,NULL,'');
INSERT INTO "keywords" VALUES(4,'2015-08-14 12:00:13','2015-08-14 12:00:13','猫',NULL,NULL,'');
INSERT INTO "keywords" VALUES(5,'2015-08-14 12:23:24','2015-08-19 10:17:29','エチオピア',NULL,NULL,'名詞');
INSERT INTO "keywords" VALUES(7,'2015-08-14 12:27:19','2015-08-14 12:27:19','煙',NULL,NULL,'');
INSERT INTO "keywords" VALUES(8,'2015-08-14 12:27:26','2015-08-14 12:27:26','カフェ',NULL,NULL,'');
INSERT INTO "keywords" VALUES(9,'2015-08-18 10:13:46','2015-08-18 10:13:46','団扇',NULL,NULL,'');
INSERT INTO "keywords" VALUES(10,'2015-08-18 10:14:00','2015-08-18 10:14:00','壁',NULL,NULL,'');
INSERT INTO "keywords" VALUES(11,'2015-08-18 10:14:07','2015-08-18 10:14:07','PC',NULL,NULL,'');
INSERT INTO "keywords" VALUES(12,'2015-08-18 10:14:20','2015-08-18 10:14:20','カーテン',NULL,NULL,'');
INSERT INTO "keywords" VALUES(13,'2015-08-18 10:14:30','2015-08-18 10:14:30','スマホ',NULL,NULL,'');
INSERT INTO "keywords" VALUES(14,'2015-08-18 10:14:39','2015-08-18 10:14:39','窓ガラス',NULL,NULL,'');
CREATE TABLE sens (
	id			INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL,
	created_at	VARCHAR(30),
	updated_at	VARCHAR(30),
	
    text		TEXT,
    
    kws			VARCHAR(50),
    
    memo		TEXT
	
);
INSERT INTO "sens" VALUES(2,'2015-08-17 12:41:23','2015-08-17 12:41:23',NULL,'リチャード・コシミズ_尾道講演会2015/05/23',NULL);
INSERT INTO "sens" VALUES(3,'2015-08-17 12:42:23','2015-08-17 12:42:23','Y Ishiguro のアップロード動画',NULL,NULL);
INSERT INTO "sens" VALUES(4,'2015-08-17 12:44:13','2015-08-17 12:44:13','Y Ishiguro のアップロード動画',NULL,NULL);
INSERT INTO "sens" VALUES(5,'2015-08-17 12:44:39','2015-08-17 12:44:39','$this->layout = ''plain'';',NULL,NULL);
INSERT INTO "sens" VALUES(6,'2015-08-17 12:45:23','2015-08-17 12:45:23','$this->layout = ''plain'';',NULL,NULL);
INSERT INTO "sens" VALUES(7,'2015-08-17 12:45:44','2015-08-17 12:45:44','CakePHPから文字列を直接表示する。phpinfoを表示する.',NULL,NULL);
INSERT INTO "sens" VALUES(8,'2015-08-17 12:48:54','2015-08-17 12:48:54','Inch-time の「Cloud Hidden」 (eMusic • iTunes)',NULL,NULL);
INSERT INTO "sens" VALUES(9,'2015-08-17 12:49:15','2015-08-19 10:43:53','Inch-time の「Cloud Hidden」 (eMusic • iTunes)
传统上这样的日期界定了一年中绝大多数3',' 4 5�','��成中�');
/**** ERROR: (11) database disk image is malformed *****/
/**** ERROR: (11) database disk image is malformed *****/
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('keywords',14);
INSERT INTO "sqlite_sequence" VALUES('sens',19);

