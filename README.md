## About project

A laravel project using google sheet 

Current Version 1.0.1
Laravel Version - 10

## New Features

-
 ## Pakages Used

 - laravel-google-sheets - https://github.com/kawax/laravel-google-sheets
 

## SetUp

1. Basic commands

```
 composer install
 cp .env.example .env
 php artisan key:generate
 npm install

```

2. Get API Credentials from https://developers.google.com/console  
Enable `Google Sheets API`, `Google Drive API`. 
(get auth 2.o client id,secret from 
https://console.cloud.google.com/apis/credentials)

3. Configure .env

    GOOGLE_CLIENT_ID=enter_clinet_id
    ## 
    GOOGLE_CLIENT_SECRET=enter_client_secret
    ##
    GOOGLE_SERVICE_ENABLED=true
    ##
    GOOGLE_SHEET_ID=the_id_of_the_google_sheet_file
    ##
    GOOGLE_SUB_SHEET_NAME=the_name_of_sheet_created_inside_the_sheet_file

4. Add Service Account

copy and paste service account json file at storage/google_sheets.json.a sample is given below for referenece

    {
        "type": "service_account",
        "project_id": "project_id",
        "private_key_id": "private_key_id",
        "private_key": "private_key",
        "client_email": "client_email",
        "client_id": "client_id",
        "auth_uri": "auth_uri",
        "token_uri": "token_uri",
        "auth_provider_x509_cert_url": "auth_provider_x509_cert_url",
        "client_x509_cert_url": "client_x509_cert_url"
    }

5. Then run

- while in development

    ```
    npm run dev 

    php artisan serve

    ```

- for production

        npm run dev 

- the end it 

        npm run build 

    

    




