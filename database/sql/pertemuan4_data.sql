USE praktikum_web_2401020125;

INSERT INTO program_studi (nama_prodi) VALUES
('Teknik Informatika'),
('Teknik Maritim');

INSERT INTO mahasiswa (nim, nama, email, usia, program_studi_id) VALUES
('2401020125', 'Muhammad Fatahillah Ilmi', 'fatahillah@example.com', 20, 1),
('2401020126', 'Rian Ardianto', 'rian@example.com', 21, 1),
('2401020201', 'Siti Nurhaliza', 'siti@example.com', 19, 2),
('2401020999', 'Data Temp', 'temp@example.com', 18, 2);

UPDATE mahasiswa
SET email = 'rian.ardianto@example.com'
WHERE nim = '2401020126';

DELETE FROM mahasiswa
WHERE nim = '2401020999';

SELECT 
    m.nim, 
    m.nama, 
    m.email, 
    m.usia, 
    p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p ON p.id = m.program_studi_id
ORDER BY m.nim;