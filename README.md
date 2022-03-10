# Weathering with Ü - A Hybrid Mobile App

## Overview
Weather information is crucial to anyone who is working, or even if you are still just a student. It enables you to plan ahead, from the most trivial question of whether to bring an umbrella up to the knotty task of rescheduling important events. This project takes weather apps a step further by allowing users to connect with other people.

## Requirements
- PHP 7.4.0 or higher.
- MySQL 8.0.21 or higher.
- Cordova 10.0.0 or higher.
- Node.js 14.16.0 or higher *(Cordova Dependecy)*
- JDK 8 *(Cordova Dependecy)*
- Gradle 7.2 or higher *(Cordova Dependecy)*

## Installation
1. Clone the repository.
	```bash
		git clone https://github.com/theresa-de-ocampo/weather-app.git
	```
2. Host the project in `weather-app`.
3. Through your hosting site's database manager, run the SQL file.
	```sql
		source your-path/weather-app/config/setup-database.sql
	```
4. Through your hosting site's file manager, change the DSN at `your-path/weather-app/config/config.php`.
	```php
		define("DB_HOST", "your-hosting-site");
		define("DB_USER", "your-username");
		define("DB_PASSWORD", "your-password");
	```
5. Change line 8 of `cordova-app/www/js/app.js`to your website's URL.
6. On your terminal, navigate to `cordova-app`, and run the following.
	```bash
		cordova platform add android
		cordova build android
	```
7. Run the generated APK file - `your-path\cordova-app\platforms\android\app\build\outputs\apk\debug\app-debug.apk`.

## Sample Outputs
![Application Screenshots](sample-outputs.gif)<br />
(c) Logo By [Arthiiird](https://www.facebook.com/arthiiird)