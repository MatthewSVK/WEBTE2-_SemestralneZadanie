# WEBTE2-_SemestralneZadanie trubky

## Ako si to clonnut a rozbehat na localhoste ?
1. git clone https://github.com/MatthewSVK/WEBTE2-_SemestralneZadanie.git
2. v cloned adresari si treba vytvorit subor **.env**
3. skopirovat obsah na tomto linku [.ENV example](https://github.com/platformsh-templates/laravel/blob/master/.env.example) a dat do vaseho vytvoreneho .env suboru
4. pustit v tom adresari cmd a zadat prikaz **php artisan key:generate**
5. **A**, pokial nemas php nahodene v pc na windowse tak na youtube je tutorialov habadej - [PHP8.2 install](https://www.youtube.com/watch?v=MPRLUd8Pmyo&t=204s&ab_channel=GeekyScript)
6. appku pustit **php artisan serve** na localhoste:8000
7. do .gitignore si pridaj .env file a nepushuj ho na gitHub hlavna appka na Matusovej VM ma vlastny .env file

## Ako si spojazdnit ten login ?
1. Rozbehajte si mysql databazu - bud cez docker alebo barz co
2. nahodit udaje z databazy do .env filu
3. potom v priecinku semestralneho zadania -> **php artisan migrate**
4. Ak nastane chyba treba ist do korenoveho priecinku kde je nainstalovane php8.2 -> a editnut php.ini file odkomentovat extension mysql -> ctrl+f mysql
5. A hotovo!