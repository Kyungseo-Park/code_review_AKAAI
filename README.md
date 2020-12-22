### A desktop development environment
PHP >= 7.2.5  
- BCMath PHP Extension  
- Ctype PHP Extension  
- Fileinfo PHP extension  
- JSON PHP Extension  
- Mbstring PHP Extension  
- OpenSSL PHP Extension  
- PDO PHP Extension  
- Tokenizer PHP Extension  
- XML PHP Extension  

Laravel Version : 7.0  

----------------------------

### 시작  
```bash
$ git clone https://github.com/Kyungseo-Park/AKAAI_code_review
$ cd ./AKAAI_code_review
$ composer install 
```

.env 편집 
```text
DB_CONNECTION=mysql     // DBMS
DB_HOST=127.0.0.1       // Database Host
DB_PORT=3306            // Database Port
DB_DATABASE=db          // Database Name
DB_USERNAME=username    // user name
DB_PASSWORD=password    // user password
```
CMD or TERMINAL
```bash
$ php artisan migrate:refresh --seed
$ php artisan serve
```

### 접속 방법 
 - [http://localhost:8000](http://localhost:8000) 로 접속하시면 됩니다.  
 - 관리자페이지는 [http://localhost:8000/admin](http://localhost:8000/admin) 로 접속하시면 됩니다.  
   ID : AKKAI@kspkar.link  
   PW : 12341234  
  
  
  
### 2020. 12 .21(월) 코드 리뷰를 위한 준비 
 1. Seeding 추가  
 2. AdminAccount 추가  
 3. Seeding에 맞추어 파일 관련 수정  