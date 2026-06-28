-- Create Database
CREATE DATABASE IF NOT EXISTS u572932744_dcw_certs;
USE u572932744_dcw_certs;

-- Create Participants Table
CREATE TABLE IF NOT EXISTS wikiversary2026_participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    designation VARCHAR(100),
    certificate_id VARCHAR(50) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
