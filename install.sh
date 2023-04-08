ENV=$1
export DB_PW=$2
PHP_VERSION=$3

alias artisan="php${PHP_VERSION} artisan";
cat .env.$ENV | sed -r 's/\$\{DB_PW\}/'$DB_PW'/g' > .env
artisan migrate
artisan db:seed
chmod -R 0777 storage
artisan passport:install
artisan db:seed --class = OauthClientsStaticDef