<?php
	//define("PHP_TIMEZONE","Asia/Bangkok");
	//define("PHP_DATEFORMAT","Asia/Bangkok");
    
    //define("APP_ENV","live");
    define("APP_ENV","staging");    
    //define("APP_ENV","local");    
    
    //define("ROOT_DIR","/externalVolume/html/inspiringvillas.com");   
    define("ROOT_DIR","/var/www/html/inspiringvillas.com");   
    //define("ROOT_DIR","F:/www/inspiringvillas");
	
	/*define("DB_NAME","starjour_db");
	define("DB_USER","starjour_user");
	define("DB_PASS","inv159753");
	define("DB_SERVER","localhost");*/

	define("DB_NAME","inspiring_db");
	define("DB_USER","inspiring_user");
	define("DB_PASS","j7STW^7Sh#Fy");
    	define("DB_SERVER","localhost");
    
	define("DEBUG_MODE",false);
	
	define("DEFAULT_TIMEZONE","Asia/Bangkok");
	define("DEFAULT_LANGUAGE","en");
	
    define("DEFAULT_THEME","default");
    
    if(APP_ENV == "live") define("S3_BUCKET_URL","https://s3-ap-southeast-1.amazonaws.com/static.inspiringvillas.com");
#    elseif(APP_ENV == "staging") define("S3_BUCKET_URL","https://s3-ap-southeast-1.amazonaws.com/static.inspiringvillas.com/staging");
    elseif(APP_ENV == "staging") define("S3_BUCKET_URL","https://media.inspiringvillas.com/staging");
#    elseif(APP_ENV == "staging") define("S3_BUCKET_URL","https://static.inspiringvillas.com/staging");
    elseif(APP_ENV == "local") define("S3_BUCKET_URL","https://staging.inspiringvillas.com");
#    elseif(APP_ENV == "local") define("S3_BUCKET_URL","http://ec2-52-76-65-179.ap-southeast-1.compute.amazonaws.com");
?>
