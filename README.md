# JoliNotif

[![Build Status](https://travis-ci.org/jolicode/JoliNotif.svg?branch=master)](https://travis-ci.org/jolicode/JoliNotif)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9220d9bc-bb95-4478-b64e-78257f15266b/mini.png)](https://insight.sensiolabs.com/projects/9220d9bc-bb95-4478-b64e-78257f15266b)

PHP >= 5.4

JoliNotif is a PHP library to send notifications to your desktop directly from
your script. It takes care of using the right command available, without having
you to worry if you're running on Linux, Windows or MacOS.

For example, if you have a long running PHP task - like executing a large test
suite, launching a deployment script - you can use JoliNotif to inform yours
users that a task just finished.

## Installation

Use [Composer](http://getcomposer.org/) to install JoliNotif in your project:

```shell
composer require "jolicode/jolinotif"
```

## Usage

The main interface is `Notifier`. A `NotifierFactory` takes care of creating a
`Notifier` according to which notifiers are available on your system.

> **Note**: The factory returns null if not any notifier is supported on your
> system.

Look at below (or [example/index.php](example/index.php)) to see an example on
how to use JoliNotif.

```php
use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;

// Create a Notifier
$notifier = NotifierFactory::create();

// Create your notification
$notification = new Notification();
$notification
    ->setTitle('I\'m a notification title')
    ->setBody('And this is the body')
    ->setIcon(__DIR__.'/notification-icon.png')
;

// Send it
$notifier->send($notification);
```

`Notifier#send()` will return true if the command was successfully executed,
false otherwise.

## Notification options

Currently, only three options are supported:
* body
* title
* icon

> **Important**: The only required property on Notification is the body.
> The notifier will throw an InvalidNotificationException if it is empty.

> **Note**: If you use JoliNotif from a phar and provide a notification icon,
> the notification will take care to extract this image in your system temp
> directory to make it accessible from native commands.

> **Note**: New properties could be added later on Notification. Notifiers are
> designed to handle the properties they support and discard not supported ones
> without throwing any exception.

## Notifier supported

Currently, these notifiers are supported:
* notify-send: should be available on most linux distributions
* growl-notify: can be available on Mac OS X
* terminal-notifier: can be available on Mac OS X 10.8 and higher
* AppleScript: can display notification since Mac OS X 10.9
* Toaster: binaries are embedded in [bin/toaster](bin/toaster) so it can always
be used on Windows 8 and higher
* Notifu: binary is embedded in [bin/notifu](bin/notifu) so it can always be
used on Windows 7

## Further documentation

You can see the current and past versions using one of the following:

* the `git tag` command
* the [releases page on Github](https://github.com/jolicode/JoliNotif/releases)
* the file listing the [changes between versions](CHANGELOG.md)

You can find more documentation at the following links:

* [versioning and branching models](VERSIONING.md)
* [contribution instructions](CONTRIBUTING.md)

## Credits

* [All contributors](https://github.com/jolicode/JoliNotif/graphs/contributors)
* This project was originally inspired by [mikaelbr/node-notifier](https://github.com/mikaelbr/node-notifier)

## License

View the [LICENSE](LICENSE) file attached to this project.
