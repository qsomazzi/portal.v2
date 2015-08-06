.PHONY: install update clean dev assets

help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo "  install    to make a Composer install"
	@echo "  update     to make a Composer update then a Bower update"
	@echo "  clean      to remove and warmup cache"
	@echo "  dev        to start Built-in web server of PHP"
	@echo "  assets     to install assets"

install:
	composer install
	#bower install

update:
	composer update
	#bower update

clean:
	rm -rf app/cache/*
	php app/console cache:warmup --env=prod --no-debug
	php app/console cache:warmup --env=dev

dev:
	php app/console server:run

assets:
	if [ ! -f bin/yuicompressor.jar ]; then curl -L https://github.com/yui/yuicompressor/releases/download/v2.4.8/yuicompressor-2.4.8.jar > bin/yuicompressor.jar; fi;
	app/console assets:install --symlink web
	app/console assetic:dump

assets-watch:
	app/console assetic:dump --watch