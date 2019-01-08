# Viber Bot

[![Latest Version](https://img.shields.io/github/release/paragraf-lex/viber-bot.svg?style=flat-square)](https://github.com/paragraf-lex/viber-bot/releases)

## Installation

This package can be installed through Composer.

``` bash
composer require paragraf-lex/viber-bot
```

In Laravel 5.5 and above the package will autoregister the service provider. In Laravel 5.4 you must install this service provider.

```php
// config/app.php
'providers' => [
    ...
    Paragraf\ViberBot\ViberBotServiceProvider::class,
    ...
];
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.



## Configuration

You need to set in `.env` and setup `webhook`.

#### Env
```bash
VIBERBOT_API=your_viber_token
VIBERBOT_NAME=name
VIBERBOT_PHOTO=photo
```
You can find Viber token on [Viber Partners](https://partners.viber.com) after creating bot on Info tab.

#### WebHook
You must run artisan command for webhoook with url parameter
```bash
php artisan viber-bot:webhook https://example-url.com/some-route
```
Note: It must be full url and must be HTTPS.

#### Config file
Optionally, you can publish the config file of this package with this command:

``` bash
php artisan vendor:publish --provider="Paragraf\ViberBot\ViberBotServiceProvider"
```

The following config file will be published in `config/viberbot.php`

## Usage

When the installation is done you have access to `Bot` and `Client` class.

### Bot class

With bot class you naivgate your VberBot how to work.

```php 
(new Bot($request, new TextMessage()))
  ->on(new MessageEvent($request->timestamp, $request->message_token, 
  new ViberUser($request->sender['id'],$request->sender['name']), $request->message))
  ->hears("Hi!")
  ->replay("Hello World!")
  ->send();
```

You can change responding type Message and Event who listen that event.

| API | Accept | Description |
| --- | --- | --- |
| `on(new MessageEvent(...))` | `Event object` | Listen specific Event |
| `hears("Hi!")` | `string, array` | ViberBot listen key word `Hi!`, can be array for more words for one event |
| `replay("Hello World!")` | `string, array, Model` | ViberBot respond with `Hello World!`, can be array or Model |
| `send()` | --- | Send respond to Viber server. |


#### List of Events:

 - ConversationStartedEvent
 - DeliveredEvent
 - FailedEvent
 - MessageEvent
 - SeenEvent
 - SubscribedEvent
 - UnsubscribedEvent
 
 Note: 
 If you don't want to listen all events you can change `event_types` in `config/viberbot.php`.
 If you change you must run again `php artisan viber-bot:webhook your-url` in oreder to apply changes.
 
 
#### List of Messages:
 
 - TextMessage
 - BroadcastMessage
 - ContactMessage
 - FileMessage
 - KeyboardMessage
 - LocationMessage
 - PictureMessage
 - StickerMessage
 - URLMessage
 - VideoMessage
 - WelcomeMessage
 - CarouselMessage - ToDo

### Client class

Client class, provide to you extra utility.

```php 
 (new Client())->broadcast('Hello', User::all(), 'name');
```

| API |Description |
| --- | --- |
| `broadcast($text, $model, $method)` | Broadcast message to all subscribed user on Viber Chat, 300 users per request |
| `getUserDetails($user_id)` | Get details for specific user |
| `getOnlineStatus(array $userIds)` | Get online statuses for users, 100 users per request |
| `getAccountInfo()` | Get account information (Your Public Account) |
| `removeWebhook()` | Remove WebHook |

If you want more information about Viber API or how something works check [Viber REST API](https://developers.viber.com/docs/api/rest-bot-api/)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nemanja.ivankovic@paragraf.rs instead of using the issue tracker.

## Credits

- [Nemanja Ivankovic](https://github.com/necko1996)
- [All Contributors](../../contributors)
