
# Todo task list

A simple todo list

Autores: [@rstriquer](https://gist.io/@rstriquer/4e8012db1a55bebdc99672d2d178bbaa/)

Licence: [MIT](https://choosealicense.com/licenses/mit/)
## Used Stack

* **Front-end:** Vue3, Bootstrap

* **Back-end:** Laravel9

* **Infrastructure:** Docker, Mysql


## Install

First of all you need to clone the repository and run like bellow:

```bash
git clone https://github.com/<user name>/<pack name>
```

**IMPORTANT**: the next step (running the docker container) may take a few minutes therefore please give it a few moments (like 3 to 5 minutes - for it is building the database) before carry on the execution.

Then you need to access the cloned repository and start docker with the command ```docker-compose up -d```.

Once you have done that you can run the mysql commands to grant privileges to the user

```bash
mysql -h 127.0.0.1 --port 3310 -u root -proot -e "CREATE DATABASE todolist; GRANT ALL PRIVILEGES ON todolist.* TO 'todolist'@'%' IDENTIFIED BY '123456';"
```

Finaly you run the sequence ....

```bash
cp .env.example .env
composer install
./artisan migrate:install
./artisan migrate --seed
mvm install
nvm use
npm install
```

If you whish you can populate the database with some lines with the seeder running ```./artisan db:seed```