Setup
- Clone project from git@github.com:khanhnguyencntt92/my-work.git
- Runing `composer update` command
- Setting config on directory config/app.php follow: 
	+ db.driver
	+ db.host
	+ db.username
	+ db.password
	+ db.db_name
- Accessing to `my-work.local` URL (You can change virtual domain follow your etc/hosts)

Document:
- Route: follow params from GET params: 
	+ controller: Controller name
	+ method: Method of controller
- Controller methods:
	+ _get: To get $_GET variables
	+ _post: To get $_POST variables
	+ _view: To call view in directory app/Views/{file}.php
- Model methods:
	+ fetchOne: To get one element from DB
	+ fetch All: To get all elements from DB
- Views:
	+ Simple view with HTML and embed PHP code