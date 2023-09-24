DROP DATABASE IF EXISTS durian_slumbung;
CREATE DATABASE durian_slumbung;

USE durian_slumbung;

CREATE TABLE olahan(
    nama VARCHAR(25) PRIMARY KEY,
    img VARCHAR(25)
);

INSERT INTO olahan VALUES('Keripik Durian', 'keripik_durian.jpg');
INSERT INTO olahan VALUES('Pie Durian', 'pie_durian.jpg');
INSERT INTO olahan VALUES('Ketan Durian', 'ketan_durian.jpg');
INSERT INTO olahan VALUES('Susu Durian', 'susu_durian.jpg');
CREATE TABLE book_olahan(
    inv_id VARCHAR(25) PRIMARY KEY,
    tgl_pesan DATE,
    tgl_dipesan DATE,
    sesi VARCHAR(255),
    olahan VARCHAR(255),
    nama VARCHAR(255),
    nowa VARCHAR(255),
    orang INT,
    bukti_bayar VARCHAR(255),
    status INT(3)
);

INSERT INTO book_olahan VALUES('INV001', '2023-09-01', '2023-09-23', 1, 'Budi', '0810213', 'trf', 0);
INSERT INTO book_olahan VALUES('INV002', '2023-09-04', '2023-09-25', 1, 'Tina', '081234234', 'trf', 1);
INSERT INTO book_olahan VALUES('INV003', '2023-09-01', '2023-09-16', 1, 'Lily', '081235334', 'trf', 2);
INSERT INTO book_olahan VALUES('INV004', '2023-09-12', '2023-09-30', 1, 'Rara', '0810213', 'trf', 0);

CREATE TABLE stok_durian(
    tanggal DATE PRIMARY KEY,
    kecil INT,
    sedang INT,
    besar INT
);

CREATE TABLE book_durian(
    inv_id VARCHAR(25) PRIMARY KEY,
    tgl_pesan DATE,
    tgl_dipesan DATE,
    nama VARCHAR(25),
    nowa VARCHAR(25),
    kecil INT,
    sedang INT,
    besar INT,
    bukti_bayar VARCHAR(255),
    status INT(3)
);