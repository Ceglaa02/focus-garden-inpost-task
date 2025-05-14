# Instalacja projektu

## 1. Po pobraniu projektu proszę utworzyć kontener za pomocą
```bash
docker compose up -d
``` 

## 2. Proszę wejść do kontenera
```bash
 docker exec -it php-fpm bash
``` 

## 3. Proszę zaktualizować composera
```bash
 composer install
``` 

# Konfiguracja

## 1. Proszę znaleźć plik .env_temp w katalogu config
## 2. Proszę wypełnić
```bash
INPOST_API_TOKEN= "tutaj token do api"
INPOST_GROUP_ID= "tutaj id organizacji z panelu inpost - potrzebne do utworzenia endpointu"
``` 
## 3. Następnie proszę usunąć z nazwy pliku "_temp" lub skopiować zawartość do pliku .env - musi być w katalogu config

## 4. Przykładowy prawidłowo wypełniony .env
```bash
INPOST_API_TOKEN="token"
INPOST_GROUP_ID="id"
INPOST_API_URL=https://sandbox-api-shipx-pl.easypack24.net
INPOST_API_END_POINT=/v1/organizations/:organization_id/shipments
``` 

# Uruchomianie skryptu

## 1. Wracamy do terminala w dockerze i wpisujemy
```bash
php create_shipment.php
```
### W przypadku powodzenia w konsoli zostanie wyświetlony shipment, jeśli nie to komunikat błędu