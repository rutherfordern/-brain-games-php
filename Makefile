install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin	

brain-games:
	php bin/brain-games.php

brain-even:
	php bin/brain-even.php

brain-calc:
	php bin/brain-calc.php