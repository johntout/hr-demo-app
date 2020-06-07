# hr-demo-app
HR demo app for managing users and vacation applications


## Requirements
<ul>
<li>PHP >= 7</li>
<li>MariaDB or MySQL</li>
</ul>

## How to start
Step 1: Go to your desired directory: `cd projects`

Step 2: Clone the repository: `git clone https://github.com/johntout/hr-demo-app.git && cd hr-demo-app`

Step 3: Install dependencies: `composer install`

Step 4: Import `demo_app.sql` file to create the tables for your database.

Step 5: Rename `.env.example` to `.env` and fill in all information needed. Email is set up to work with mailtrap. You have just to fill in the username and email provided by mailtrap. If you need to work with your own mail server propably you will need to tweak PHP Mailer configuration on `app/Services/MailService` class. In the `.env` file, DOMAIN variable is needed without trailing `/` in order to generate proper email approve/reject link. 

Step 6: Login to administration panel by going to yourdomain.com/panel
Username: admin@test.com
Password: 12345
