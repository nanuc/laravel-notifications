This package lets you use notifications in your applications.
It comes with one table for notifications and another one to attach those to users.


## Installation
`composer require nanuc/laravel-notifications`

## Usage
Add the `HasNotificaitons` trait to your model.
Now you can use the built-in helpers like `dueNotificationsForUser`, `dueNotifications`, `notifications` to query specific notificstions for you user model.
