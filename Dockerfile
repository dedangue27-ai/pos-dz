# استخدام صورة رسمية تدعم PHP مع خادم الويب Apache
FROM php:8.1-apache

# تفعيل إضافات قاعدة البيانات MySQL المطلوبة لتشغيل ملفات الاتصال (مثل db.php)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# نسخ جميع ملفات المشروع إلى مجلد الويب الافتراضي في الخادم
COPY . /var/www/html/

# ضبط الصلاحيات للمجلد لضمان عمل الملفات بسلاسة
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
