1 sudo apt update && sudo apt upgrade -y

  sudo apt install -y nginx mariadb-server curl wget unzip

2 Install PHP 8.2

sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-zip php8.2-gd php8.2-curl

cek versi php
php -v

3. Konfigurasi MariaDB

sudo mysql_secure_installation

Buat database dan user untuk aplikasi

sudo mysql -u root -p


CREATE DATABASE apotik;
CREATE USER 'user'@'localhost' IDENTIFIED BY 'password_kuat';
GRANT ALL PRIVILEGES ON apotik.* TO 'user'@'localhost';
FLUSH PRIVILEGES;
EXIT;


4. Upload Aplikasi 
Buat direktori untuk aplikasi

sudo mkdir -p /var/www/ucapotik
sudo chown -R www-data:www-data /var/www/ucapotik


Upload file aplikasi (via SCP/SFTP atau git)

scp -r /path/ke/ucapotik user@server_ip:/var/www/ucapotik


set permision

sudo chmod -R 755 /var/www/ucapotik



5. Konfigurasi Nginx
Buat file vhost


sudo nano /etc/nginx/sites-available/ucapotik

server {
    listen 80;
    server_name aplikasi.example.com; # Ganti dengan domain Anda
    root /var/www/ucapotik;
    index index.php index.html index.htm;
    access_log /var/log/nginx/aplikasi_access.log;
    error_log /var/log/nginx/aplikasi_error.log;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

   location ~ /\.ht {
        deny all;
    }
    # Untuk anda (jika ada file khusus)
    location ~* ^/(api|css|js|images|uploads)/ {
        try_files $uri $uri/ =404;
    }
}


Aktifkan Konfigurasi

sudo ln -s /etc/nginx/sites-available/aplikasi_anda /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx

6. Konfigurasi PHP-FPM

Edit konfigurasi PHP-FPM:

sudo nano /etc/php/8.2/fpm/php.ini

upload_max_filesize = 32M
post_max_size = 32M
memory_limit = 256M
max_execution_time = 300
date.timezone = Asia/Jakarta # Sesuaikan dengan timezone Anda

Restart PHP-FPM:

sudo systemctl restart php8.2-fpm


7. Konfigurasi Aplikasi 
Sesuaikan file konfigurasi database

Edit file konfigurasi database aplikasi (biasanya /folderaplikasi/src/config.developmet.php atau config.production.php dengan detail database yang telah dibuat.
Jalankan migrasi database (jika ada)

Jika aplikasi Anda memiliki migrasi database, jalankan:

8. Install SSL (Opsional)

Jika ingin menggunakan HTTPS, Anda bisa install Let's Encrypt:

sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d aplikasi.example.com

9. Restart Layanan

sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
sudo systemctl restart MariaDB

10. Testing

Akses aplikasi melalui browser:

http://aplikasi.example.com


Troubleshooting

    Jika ada error 502 Bad Gateway:

        Pastikan PHP-FPM berjalan: sudo systemctl status php8.2-fpm

        Periksa socket PHP-FPM di konfigurasi Nginx

    Jika ada error database:

        Periksa koneksi database di file konfigurasi

        Verifikasi user database memiliki hak akses yang cukup

    Jika ada error permission:

sudo chown -R www-data:www-data /var/www/aplikasi_anda
sudo chmod -R 755 /var/www/aplikasi_anda

