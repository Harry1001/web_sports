/*
Navicat SQLite Data Transfer

Source Server         : web
Source Server Version : 31300
Source Host           : :0

Target Server Type    : SQLite
Target Server Version : 31300
File Encoding         : 65001

Date: 2017-02-28 10:38:28
*/

PRAGMA foreign_keys = OFF;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS "main"."activity";
CREATE TABLE "activity" (
"id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"title"  TEXT NOT NULL,
"introduction"  TEXT,
"time"  INTEGER,
"position"  TEXT,
"content"  TEXT,
"launcher_id"  INTEGER NOT NULL,
CONSTRAINT "fk_launcher_id" FOREIGN KEY ("launcher_id") REFERENCES "user" ("id") ON UPDATE CASCADE
);

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO "main"."activity" VALUES (2, '玄武湖交友', '泡妹子', 1480433220, '玄武湖', '泡妹子啊泡妹子泡妹子啊泡妹子泡妹子啊泡妹子', 4);
INSERT INTO "main"."activity" VALUES (4, '活动二', '活动二的介绍', 1480872000, '玄武湖', '活动二的内容活动二的内容活动二的内容活动二的内容活动二的内容', 4);
INSERT INTO "main"."activity" VALUES (8, '活动三', '活动三的介绍', 1481217600, '玄武湖', '活动三的内容活动三的内容活动三的内容活动三的内容活动三的内容活动三的内容', 4);
INSERT INTO "main"."activity" VALUES (10, '活动五', '活动五的介绍', 1481335200, '玄武湖', '活动五的内容活动五的内容活动五的内容活动五的内容活动五的内容活动五的内容', 4);
INSERT INTO "main"."activity" VALUES (12, '活动七', '活动七的介绍', 1481508000, '玄武湖', '活动七的内容活动七的内容活动七的内容活动七的内容活动七的内容活动七的内容活动七的内容', 4);
INSERT INTO "main"."activity" VALUES (14, '中山陵郊游', '中山陵郊游简介', 1481219880, '中山陵', '中山陵郊游的描述中山陵郊游的描述中山陵郊游的描述中山陵郊游的描述中山陵郊游的描述', 4);
INSERT INTO "main"."activity" VALUES (15, '老门东一日游', '老门东一日游简介', 1482412320, '老门东', '老门东一日游描述老门东一日游描述老门东一日游描述老门东一日游描述老门东一日游描述', 4);
INSERT INTO "main"."activity" VALUES (16, '老门东二日游', '老门东二日游简介', 1482325920, '老门东', '老门东一日游描述老门东一日游描述老门东一日游描述老门东一日游描述老门东一日游描述', 4);
INSERT INTO "main"."activity" VALUES (17, '秋风扫落叶', '啦啦啦啦啦', 1480512420, '南京大学', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦
', 4);
INSERT INTO "main"."activity" VALUES (18, '落叶扫秋风', '啦啦啦啦啦', 1480512420, '南京大学', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦
', 4);

-- ----------------------------
-- Table structure for body
-- ----------------------------
DROP TABLE IF EXISTS "main"."body";
CREATE TABLE "body" (
"user_id"  INTEGER NOT NULL,
"date"  INTEGER NOT NULL,
"height"  INTEGER,
"weight"  REAL,
PRIMARY KEY ("user_id" ASC, "date" ASC),
CONSTRAINT "fk_user_id" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE CASCADE ON UPDATE CASCADE
);

-- ----------------------------
-- Records of body
-- ----------------------------
INSERT INTO "main"."body" VALUES (4, 1480557600, 175, 60.0);
INSERT INTO "main"."body" VALUES (4, 1477965600, 175, 62.0);
INSERT INTO "main"."body" VALUES (4, 1475287200, 175, 64.0);
INSERT INTO "main"."body" VALUES (4, 1472695200, 174, 70.0);
INSERT INTO "main"."body" VALUES (4, 1470016800, 175, 68.0);
INSERT INTO "main"."body" VALUES (4, 1467338400, 175, 65.0);
INSERT INTO "main"."body" VALUES (4, 1464746400, 175, 61.0);
INSERT INTO "main"."body" VALUES (4, 1462068000, 176, 57.0);
INSERT INTO "main"."body" VALUES (4, 1459476000, 176, 55.0);
INSERT INTO "main"."body" VALUES (4, 1456797600, 176, 53.0);
INSERT INTO "main"."body" VALUES (4, 1454292000, 176, 59.0);

-- ----------------------------
-- Table structure for fans
-- ----------------------------
DROP TABLE IF EXISTS "main"."fans";
CREATE TABLE "fans" (
"follower_id"  INTEGER NOT NULL,
"following_id"  INTEGER NOT NULL,
PRIMARY KEY ("follower_id", "following_id"),
CONSTRAINT "fk_follower_id" FOREIGN KEY ("follower_id") REFERENCES "user" ("id") ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT "fk_following_id" FOREIGN KEY ("following_id") REFERENCES "user" ("id") ON DELETE CASCADE ON UPDATE CASCADE
);

-- ----------------------------
-- Records of fans
-- ----------------------------
INSERT INTO "main"."fans" VALUES (6, 4);
INSERT INTO "main"."fans" VALUES (8, 4);
INSERT INTO "main"."fans" VALUES (4, 5);
INSERT INTO "main"."fans" VALUES (4, 6);
INSERT INTO "main"."fans" VALUES (8, 5);

-- ----------------------------
-- Table structure for report
-- ----------------------------
DROP TABLE IF EXISTS "main"."report";
CREATE TABLE "report" (
"actvt_id"  INTEGER NOT NULL,
PRIMARY KEY ("actvt_id"),
CONSTRAINT "fk_actvt_id" FOREIGN KEY ("actvt_id") REFERENCES "activity" ("id") ON DELETE CASCADE ON UPDATE CASCADE
);

-- ----------------------------
-- Records of report
-- ----------------------------
INSERT INTO "main"."report" VALUES (9);
INSERT INTO "main"."report" VALUES (16);
INSERT INTO "main"."report" VALUES (17);

-- ----------------------------
-- Table structure for sleep
-- ----------------------------
DROP TABLE IF EXISTS "main"."sleep";
CREATE TABLE "sleep" (
"user_id"  INTEGER NOT NULL,
"date"  INTEGER NOT NULL,
"start_time"  INTEGER,
"end_time"  INTEGER,
"sleep_cycle"  BLOB,
PRIMARY KEY ("user_id" ASC, "date" ASC),
CONSTRAINT "fk_user_id" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE CASCADE ON UPDATE CASCADE
);

-- ----------------------------
-- Records of sleep
-- ----------------------------

-- ----------------------------
-- Table structure for sport
-- ----------------------------
DROP TABLE IF EXISTS "main"."sport";
CREATE TABLE "sport" (
"user_id"  INTEGER NOT NULL,
"date"  INTEGER NOT NULL,
"distance"  REAL NOT NULL DEFAULT 0,
"step"  INTEGER NOT NULL DEFAULT 0,
"duration"  REAL NOT NULL DEFAULT 0,
"calorie"  REAL NOT NULL DEFAULT 0,
PRIMARY KEY ("user_id" ASC, "date" ASC),
CONSTRAINT "fk_user_id" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE CASCADE ON UPDATE CASCADE
);

-- ----------------------------
-- Records of sport
-- ----------------------------
INSERT INTO "main"."sport" VALUES (4, 1477951200, 2.2, 2000, 1.0, 5000.0);
INSERT INTO "main"."sport" VALUES (4, 1478037600, 1.3, 1900, 1.2, 4000.0);
INSERT INTO "main"."sport" VALUES (4, 1478124000, 2.0, 2100, 2.0, 3000.0);
INSERT INTO "main"."sport" VALUES (4, 1478210400, 5.0, 9000, 5.0, 10000.0);
INSERT INTO "main"."sport" VALUES (4, 1478296800, 6.0, 10000, 6.0, 12000.0);
INSERT INTO "main"."sport" VALUES (4, 1478383200, 5.0, 8900, 0.9, 9000.0);
INSERT INTO "main"."sport" VALUES (4, 1478469600, 4.0, 10000, 1.2, 8000.0);
INSERT INTO "main"."sport" VALUES (4, 1478556000, 8.0, 20000, 2.0, 20000.0);
INSERT INTO "main"."sport" VALUES (4, 1478642400, 6.0, 30000, 1.8, 30000.0);
INSERT INTO "main"."sport" VALUES (4, 1478728800, 5.0, 25000, 3.0, 30000.0);
INSERT INTO "main"."sport" VALUES (4, 1478815200, 4.0, 20000, 1.3, 40000.0);
INSERT INTO "main"."sport" VALUES (4, 1478901600, 3.0, 20000, 1.3, 30000.0);
INSERT INTO "main"."sport" VALUES (4, 1478988000, 2.0, 14000, 1.2, 20000.0);
INSERT INTO "main"."sport" VALUES (4, 1479074400, 1.8, 13000, 1.1, 19000.0);
INSERT INTO "main"."sport" VALUES (4, 1479160800, 1.6, 12000, 1.0, 17000.0);
INSERT INTO "main"."sport" VALUES (4, 1479247200, 1.2, 9000, 0.7, 13000.0);
INSERT INTO "main"."sport" VALUES (4, 1479333600, 1.0, 5000, 0.4, 10000.0);
INSERT INTO "main"."sport" VALUES (4, 1479420000, 1.0, 4000, 0.4, 10000.0);
INSERT INTO "main"."sport" VALUES (4, 1479506400, 0.4, 2000, 0.2, 3000.0);
INSERT INTO "main"."sport" VALUES (4, 1479592800, 0.4, 2090, 0.2, 3900.0);
INSERT INTO "main"."sport" VALUES (4, 1479679200, 1.0, 4000, 0.4, 5000.0);
INSERT INTO "main"."sport" VALUES (4, 1479765600, 2.0, 9000, 1.0, 8000.0);
INSERT INTO "main"."sport" VALUES (4, 1479852000, 3.0, 13000, 1.0, 12000.0);
INSERT INTO "main"."sport" VALUES (4, 1479938400, 4.0, 17000, 1.3, 20000.0);
INSERT INTO "main"."sport" VALUES (4, 1480024800, 5.0, 20000, 1.5, 30000.0);
INSERT INTO "main"."sport" VALUES (4, 1480111200, 5.0, 20000, 1.5, 30000.0);
INSERT INTO "main"."sport" VALUES (4, 1480197600, 4.0, 18000, 1.3, 24000.0);
INSERT INTO "main"."sport" VALUES (4, 1480284000, 5.5, 25000, 1.8, 38000.0);
INSERT INTO "main"."sport" VALUES (4, 1480370400, 0.2, 1000, 0.2, 1000.0);
INSERT INTO "main"."sport" VALUES (4, 1480456800, 2.0, 5000, 0.4, 10000.0);
INSERT INTO "main"."sport" VALUES (4, 1480543200, 2.0, 6000, 0.5, 10000.0);

-- ----------------------------
-- Table structure for sqlite_sequence
-- ----------------------------
DROP TABLE IF EXISTS "main"."sqlite_sequence";
CREATE TABLE sqlite_sequence(name,seq);

-- ----------------------------
-- Records of sqlite_sequence
-- ----------------------------
INSERT INTO "main"."sqlite_sequence" VALUES ('_user_old_20161201', 8);
INSERT INTO "main"."sqlite_sequence" VALUES ('activity', 18);
INSERT INTO "main"."sqlite_sequence" VALUES ('user', 8);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "main"."user";
CREATE TABLE "user" (
"id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"username"  TEXT NOT NULL,
"password"  TEXT NOT NULL,
"email"  TEXT NOT NULL,
"avatar"  TEXT,
"type"  INTEGER NOT NULL DEFAULT 0,
CONSTRAINT "uk_username" UNIQUE ("username" ASC)
);

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "main"."user" VALUES (4, 'dbc', '$2y$10$cfx34fxM9VYLFDf2xcbTOOXw6OeB0ym3wj9PCC6OId9ak/IQ/NLZe', 'dbc1994@126.com', null, 0);
INSERT INTO "main"."user" VALUES (5, 'harry', '$2y$10$MLIVswjWp9AAm7sCvMI17OUxs3gWPSiEHH2p5xITnCN6I9Zod2.6W', 'hjhjs@126.com', null, 1);
INSERT INTO "main"."user" VALUES (6, 'MrZero', '$2y$10$Ein6ZaeF5BFGVUQ/LO0HIO88tVv7N88.yoeNieRd7flW5.dJUOUBe', 'kaskd@gg.com', null, 0);
INSERT INTO "main"."user" VALUES (7, 'User1', '$2y$10$rGGhcz0CdgUhMww.PcSJk.jXALPSK0nGTb4Bq3MnKolpggFMps5C6', 'user1@gmail.com', null, 0);
INSERT INTO "main"."user" VALUES (8, 'user2', '$2y$10$IZBESwIbVuHw1TeZYeiP5OSmMEKwIJbxbgyxVEhrLZv8Hrssr1Tru', 'user2@123.com', null, 0);

-- ----------------------------
-- Table structure for user_activity
-- ----------------------------
DROP TABLE IF EXISTS "main"."user_activity";
CREATE TABLE "user_activity" (
"user_id"  INTEGER NOT NULL,
"actvt_id"  INTEGER NOT NULL,
PRIMARY KEY ("user_id", "actvt_id"),
CONSTRAINT "fk_user_id" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON UPDATE CASCADE,
CONSTRAINT "fk_actvt_id" FOREIGN KEY ("actvt_id") REFERENCES "activity" ("id") ON UPDATE CASCADE
);

-- ----------------------------
-- Records of user_activity
-- ----------------------------
INSERT INTO "main"."user_activity" VALUES (4, 3);
INSERT INTO "main"."user_activity" VALUES (4, 2);
INSERT INTO "main"."user_activity" VALUES (5, 2);
INSERT INTO "main"."user_activity" VALUES (5, 3);
INSERT INTO "main"."user_activity" VALUES (5, 4);
INSERT INTO "main"."user_activity" VALUES (5, 8);
INSERT INTO "main"."user_activity" VALUES (5, 9);
INSERT INTO "main"."user_activity" VALUES (5, 10);
INSERT INTO "main"."user_activity" VALUES (5, 11);
INSERT INTO "main"."user_activity" VALUES (5, 12);
INSERT INTO "main"."user_activity" VALUES (5, 13);
INSERT INTO "main"."user_activity" VALUES (5, 14);
INSERT INTO "main"."user_activity" VALUES (4, 14);
INSERT INTO "main"."user_activity" VALUES (4, 11);
INSERT INTO "main"."user_activity" VALUES (4, 13);
INSERT INTO "main"."user_activity" VALUES (4, 8);
INSERT INTO "main"."user_activity" VALUES (8, 4);
INSERT INTO "main"."user_activity" VALUES (8, 14);
INSERT INTO "main"."user_activity" VALUES (8, 9);
INSERT INTO "main"."user_activity" VALUES (4, 16);

-- ----------------------------
-- Table structure for _report_old_20161201
-- ----------------------------
DROP TABLE IF EXISTS "main"."_report_old_20161201";
CREATE TABLE "_report_old_20161201" (
"id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"actvt_id"  INTEGER NOT NULL,
"user_id"  INTEGER NOT NULL,
"reason"  TEXT,
"is_handled"  INTEGER NOT NULL DEFAULT 0,
CONSTRAINT "fk_actvt_id" FOREIGN KEY ("actvt_id") REFERENCES "activity" ("id") ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT "fk_user_id" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON UPDATE CASCADE
);

-- ----------------------------
-- Records of _report_old_20161201
-- ----------------------------

-- ----------------------------
-- Table structure for _user_old_20161201
-- ----------------------------
DROP TABLE IF EXISTS "main"."_user_old_20161201";
CREATE TABLE "_user_old_20161201" (
"id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"username"  TEXT NOT NULL,
"password"  TEXT NOT NULL,
"email"  TEXT NOT NULL,
"avatar"  TEXT,
CONSTRAINT "uk_username" UNIQUE ("username" ASC)
);

-- ----------------------------
-- Records of _user_old_20161201
-- ----------------------------
INSERT INTO "main"."_user_old_20161201" VALUES (4, 'dbc', '$2y$10$cfx34fxM9VYLFDf2xcbTOOXw6OeB0ym3wj9PCC6OId9ak/IQ/NLZe', 'dbc1994@126.com', null);
INSERT INTO "main"."_user_old_20161201" VALUES (5, 'harry', '$2y$10$MLIVswjWp9AAm7sCvMI17OUxs3gWPSiEHH2p5xITnCN6I9Zod2.6W', 'hjhjs@126.com', null);
INSERT INTO "main"."_user_old_20161201" VALUES (6, 'MrZero', '$2y$10$Ein6ZaeF5BFGVUQ/LO0HIO88tVv7N88.yoeNieRd7flW5.dJUOUBe', 'kaskd@gg.com', null);
INSERT INTO "main"."_user_old_20161201" VALUES (7, 'User1', '$2y$10$rGGhcz0CdgUhMww.PcSJk.jXALPSK0nGTb4Bq3MnKolpggFMps5C6', 'user1@gmail.com', null);
INSERT INTO "main"."_user_old_20161201" VALUES (8, 'user2', '$2y$10$IZBESwIbVuHw1TeZYeiP5OSmMEKwIJbxbgyxVEhrLZv8Hrssr1Tru', 'user2@123.com', null);

-- ----------------------------
-- Indexes structure for table activity
-- ----------------------------
CREATE INDEX "main"."idx_launcher_id"
ON "activity" ("launcher_id" ASC);

-- ----------------------------
-- Indexes structure for table fans
-- ----------------------------
CREATE INDEX "main"."idx_following_id"
ON "fans" ("following_id" ASC);

-- ----------------------------
-- Indexes structure for table user_activity
-- ----------------------------
CREATE INDEX "main"."idx_actvt_id"
ON "user_activity" ("actvt_id" ASC);
PRAGMA foreign_keys = ON;
