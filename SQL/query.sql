-- Membuat database
CREATE DATABASE IF NOT EXISTS db_tp4_mvc;

-- Menggunakan database
USE db_tp4_mvc;

-- Membuat tabel job
CREATE TABLE IF NOT EXISTS job (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_title VARCHAR(255) NOT NULL,
  salary DECIMAL(10,2)
);

-- Membuat tabel members
CREATE TABLE IF NOT EXISTS members (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  job_id INT,
  FOREIGN KEY (job_id) REFERENCES job(id)
);

-- Menambahkan data ke tabel job
INSERT INTO job (job_title, salary)
VALUES
  ('Manager', 5000),
  ('Supervisor', 4000),
  ('Engineer', 3000),
  ('Analyst', 2500),
  ('Technician', 2000),
  ('Software Engineer', 5000),
  ('Data Analyst', 4000),
  ('Graphic Designer', 3500),
  ('Sales Executive', 4500),
  ('Accountant', 4000),
  ('Marketing Manager', 5500),
  ('Customer Service Representative', 3500),
  ('Project Manager', 6000),
  ('HR Coordinator', 3800),
  ('Operations Supervisor', 4500);
  

-- Menambahkan data ke tabel members
INSERT INTO members (name, email, phone, job_id)
VALUES
  ('Agus Setiawan', 'agussetiawan@example.com', '0812345678', 1),
  ('Rina Wati', 'rinawati@example.com', '0823456789', 3),
  ('Budi Santoso', 'budisantoso@example.com', '0834567890', 6),
  ('Siti Rahayu', 'sitirahayu@example.com', '0845678901', 8),
  ('Ahmad Maulana', 'ahmadmaulana@example.com', '0856789012', 4);


-- Membuat tabel addresses
CREATE TABLE IF NOT EXISTS addresses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  member_id INT,
  address VARCHAR(255),
  city VARCHAR(50),
  postal_code VARCHAR(10),
  FOREIGN KEY (member_id) REFERENCES members(id)
);

-- Menambahkan data ke tabel addresses
INSERT INTO addresses (member_id, address, city, postal_code)
VALUES
  (1, 'Jl. Sudirman No. 123', 'Jakarta', '12345'),
  (2, 'Jl. Thamrin No. 456', 'Bandung', '67890'),
  (3, 'Jl. Gatot Subroto No. 789', 'Surabaya', '54321'),
  (4, 'Jl. Senayan No. 012', 'Yogyakarta', '09876'),
  (5, 'Jl. Kuningan No. 345', 'Semarang', '43210');
