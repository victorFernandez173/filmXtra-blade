#para limpiar caches y optimizar
<pre>composer dump-autoload</pre>
o
<pre>composer du</pre>
<pre>php artisan cache:clear</pre>
<pre>php artisan config:clear</pre>
<pre>php artisan view:clear</pre>
<pre>php artisan route:clear</pre>
<pre>Menu->File->Ivalidate Caches...</pre>
#recrear los elementos 
<pre>npm run build</pre>
#generar un create table
<pre>show create table `nombre_de_tabla`;</pre>
#dumpear en laravel 
<pre>ddd($variable) -> muestra la pagina de error con información del dumpeo y $variable (dump, die, debug)</pre>
#a ejecutar para testear app clonada de repositorio
<pre>
composer install
npm ci
npm run dev
cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan serve
</pre>
