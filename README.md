# NFT eCommerce Simulator
_A modern platform to explore and manage a simulated NFT marketplace_

## INTRODUCTION

The **NFT eCommerce Simulator** is a project that simulates an NFT marketplace. It includes features such as:
- User authentication with access levels.
- Full CRUD operations for managing NFTs and user/administrator accounts.
- Integration with **Google Charts API** for real-time data visualization.
- Real-time calculation and display of the total value of registered NFTs.

---

## TECHNOLOGIES USED

1. **PHP**
2. **HTML** (markup)
3. **CSS3** (styling)
4. **JavaScript**
5. **MySQL** (database)

---

## REQUIREMENTS

To run the project, you need the following:
- **Linux-based system**
- **Apache Web Server** with PHP 7.4
- **MySQL Server**

---

## HOW TO START THE PROJECT :: SETTING UP A LINUX WEB SERVER

1. Apache Web Server with PHP 7.4:
    - Update system packages:
      ```bash
      sudo apt update
      ```
    - Install Apache:
      ```bash
      sudo apt install apache2
      ```
    - Check firewall application list:
      ```bash
      sudo ufw app list
      ```
    - Allow Apache through the firewall:
      ```bash
      sudo ufw allow in "Apache"
      ```
    - Confirm server IP address:
      ```bash
      curl http://icanhazip.com
      ```
2. Install MySQL Server:
    ```bash
    sudo apt install mysql-server
    ```
3. Log into MySQL:
    ```bash
    sudo mysql
    ```

4. Install PHP and necessary modules:
    ```bash
    sudo apt install php libapache2-mod-php php-mysql
    ```
5. Configure Apache to prioritize PHP files:
    ```bash
    sudo nano /etc/apache2/mods-enabled/dir.conf
    ```
6. Reload Apache to apply changes:
    ```bash
    sudo systemctl reload apache2
    ```

---

## DEFAULT MYSQL USER :: CREATING USERS

1. Log into MySQL:
    ```bash
    sudo mysql
    ```
2. Create the database:
    ```sql
    CREATE DATABASE nfts;
    ```
3. Create a new user:
    ```sql
    CREATE USER 'nft'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
    ```
4. Grant permissions to the user:
    ```sql
    GRANT ALL ON nfts.* TO 'nft'@'%';
    ```
5. Exit MySQL:
    ```bash
    exit
    ```
---

## RUNNING PROJECT QUERIES :: SQL QUERY

1. Design and execute queries as outlined in the `QUERY.sql` file.
2. Place the project files in the Apache server’s `html` directory.

---

## MYSQLI & PDO CONNECTION CONFIGURATION :: FILE `DB/conexao.php`

Database connection example:

| `$usuario`   | `$senha`     | `$database` |
|--------------|:------------:|------------:|
| xxxxxxxxx    | xxxxxxxxx    | xxxxxx      |

- Supports connection via **MySQLi** or **PDO**.
---

## PROJECT FUNCTIONALITY OVERVIEW

1. **Project Purpose**:
   - A simulation of an NFT eCommerce platform.
   - Includes user authentication with access levels.
   - Implements CRUD functionalities for managing items (create, read, update, delete) and for registering new users/administrators.
   - Login/authentication is performed through database validation using `SELECT` queries.

2. **Google Charts Integration**:
   - Incorporates **Google Charts API** to visualize real-time data from the database.
   - Includes a pie chart showing the ratio of registered users to NFTs.

3. **Dynamic NFT Calculations**:
   - Calculates and displays the total value of registered NFTs on the main page in real time.
