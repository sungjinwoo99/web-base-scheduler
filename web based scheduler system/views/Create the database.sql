-- Create the database
CREATE DATABASE scheduler_system;

-- Use the created database
USE scheduler_system;

-- Users table for admin and faculty
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'faculty') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Events table to store class schedules
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    room VARCHAR(100) NOT NULL,
    teacher_name VARCHAR(255) NOT NULL,
    start_datetime DATETIME NOT NULL,
    end_datetime DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Conflicts table to store scheduling conflicts
CREATE TABLE conflicts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    schedule_id INT NOT NULL,
    conflicting_schedule_id INT NOT NULL,
    conflict_resolved TINYINT(1) DEFAULT 0,
    resolution_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (schedule_id) REFERENCES schedules(id) ON DELETE CASCADE,
    FOREIGN KEY (conflicting_schedule_id) REFERENCES schedules(id) ON DELETE CASCADE
);

-- External calendar sync table (for logging calendar sync actions)
CREATE TABLE calendar_sync_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    calendar_service ENUM('google', 'outlook') NOT NULL,
    sync_status ENUM('success', 'failed') NOT NULL,
    sync_message TEXT,
    synced_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES schedules(id) ON DELETE CASCADE
);

-- Add event logs for tracking any event creation, deletion, updates
CREATE TABLE event_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    schedule_id INT NOT NULL,
    user_id INT NOT NULL,
    action ENUM('created', 'updated', 'deleted') NOT NULL,
    log_message TEXT,
    logged_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (schedule_id) REFERENCES schedules(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
