КриптоПро ЭЦП browser plug-in (Async)
========================
Реализация прикрепленной подписи документов на основе [КриптоПро ЭЦП browser plug-in](https://www.cryptopro.ru/products/cades/plugin), с использованием асинхронных обьектов `cadesplugin.CreateObjectAsync("CAPICOM.Store")`

#### Установка плагина (Win)
- [КриптоПро ЦСП 4.0](https://www.cryptopro.ru/products/csp/downloads)
- [КриптоПро browser plug-in 2.0](https://www.cryptopro.ru/products/cades/plugin/get_2_0)
- генерируем [тестовый сертификат](https://www.cryptopro.ru/certsrv/certrqma.asp) и импортируем его в хранилище
- генерируем [сертификат тестового атестационного центра](http://www.cryptopro.ru/certsrv/certnew.cer?ReqID=CACert&Renewal=0&Enc=bin)
- [проверяем работает ли сам плагин](https://www.cryptopro.ru/sites/default/files/products/cades/demopage/simple.html)
- добавляем в `Настройки КриптоПро ЭЦП Browser Plug-in`(для Chrome: chrome-extension://iifchhfnnmpdbibifmljnfjhpififfog/trusted_sites.html) хосты: https://*.cryptopro.ru, http://localhost:8000
- [проверка подписанного документа](https://www.gosuslugi.ru/pgu/eds/)

#### Пример использования

![DEMO](http://dl3.joxi.net/drive/2016/12/23/0017/1226/1127626/26/75112b8747.jpg)

```bash
git clone git@github.com:krecu/cryptopro-async-plugin.git
cd ./cryptopro-async-plugin
php -S localhost:8000
```
http://joxi.ru/bmoYzLeuLLYlAy

#### Методы

##### Метод `getCertsList`

Получение списка доступных сертификатов
Результат:
* Массив вида: [{}, {}, ...], где
```javascript
{
    _id: integer,    # идентификатор сертификата в CAPICOM.Store.Certificates
    _instance: {},   # обьект CAPICOM.Store.Certificates
    _valid: boolean, # действителен ли сертификат по дате завершения его действия
    _date: Date,     # дата окончания действия сертификата
    _info: []        # информация о владельце (CN - фио владельца...)
```

Вызов:
```javascript
CryptoPro.getCertsList().then(function(certs){ console.log(certs) });
```

##### Метод `signCreate`

Создание прикрепленной подписи контента в base64 кодировке
Параметры:
* cert - ФИО владельца сертификата
* data - контент в base64 кодировке

Результат:
* строка в base64

Вызов:
```javascript
CryptoPro.signCreate(cert, data).then(function(hash){ console.log(hash) });;
```
