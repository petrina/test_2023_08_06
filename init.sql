CREATE TABLE visitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(40),
    user_agent VARCHAR(255),
    view_date DATETIME,
    page_url VARCHAR(11),
    views_count INT
);
