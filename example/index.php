<?php

/**
 * This file is part of the JoliNotif project.
 *
 * (c) Loïck Piera <pyrech@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;

require __DIR__.'/../vendor/autoload.php';

$notifier = NotifierFactory::create();

$notification =
    (new Notification())
    ->setTitle('I\'m a notification title')
    ->setBody('And this is the body')
    ->setIcon(__DIR__.'/notification-icon.png')
;

$notifier->send($notification);
