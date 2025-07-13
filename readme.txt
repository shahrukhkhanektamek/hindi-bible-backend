git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/shahrukhkhanektamek/hindi-bible-backend.git
git branch -M main
git push -u origin main

git checkout -b dev

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear



composer install --no-dev --optimize-autoloader