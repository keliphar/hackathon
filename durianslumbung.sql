DROP DATABASE durian_slumbung;
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
    sesi VARCHAR(25),
    nama VARCHAR(25),
    nowa VARCHAR(25),
    bukti_bayar VARCHAR(25),
    status INT(3)
);

INSERT INTO book_olahan VALUES('INV001', '2023-09-01', '2023-09-23', 1, 'Budi', '0810213', 'trf', 0);