<h2>Pre-requisites and Dependencies:</h2>

<p>I developed this application in Windows 8, xampp 3.2.2 and wamp, mysql compatible with PHP >= 5.6.4.
This project is developed in Laravel 5.4 so system requirements are,</p>

<ul>
<li>PHP >= 5.6.4</li>
<li>OpenSSL PHP Extension</li>
<li>PDO PHP Extension</li>
<li>Mbstring PHP Extension</li>
<li>Tokenizer PHP Extension</li>
<li>XML PHP Extension
Database is used: Mysql
Other Libraries: angularjs and google maps.</li>
</ul>

<h2>Installation Instructions:</h2>

<p>
1) First check if xampp, wamp , lamp running on your local machine.
2) Get Pull from git repository.
3) Create database vea<em>db. (or whatever but sync with .env file.) 
4) You can change MAIL</em>DRIVER accordingly from .env file for mails.
5) When the database is set you can use cmd to go to the root of the folder and where you pasted the project files. And run following commands:

<p>After taking pull from git run these commands:</p>
<code>composer install</code>

<code>composer dump-autoload</code>

</p>
<p>Create the database tables.</p>
<code>php artisan migrate</code> 

<p>Add dummy data: </p>
<code>php artisan db:seed</code>

<p>This will start the project</p>
<code>php artisan serve</code>

<h2>Credentials</h2>
<p>
<code>username: admin@admin.com and password: admin </code>
will be generated as user, some unit tests are dependent on that so on development environment do not change this</p>



<h2>Unit Tests</h2>
<p>This will run all unit tests you have to open new cmd for this and run from project root:</p>
<code>vendor\bin\phpunit</code>

<h2>Send Mail Command</h2>
<p>This command will send  reports to company admins:</p>
<code>php artisan emails:send</code>


<p>I set up this working project on AWS server http://34.208.197.201:8081</p>


