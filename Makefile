install:
	composer install --prefer-dist --no-dev -o

format:
	php-cs-fixer fix --config ./.php_cs ./src

test:
	./vendor/bin/phpunit
