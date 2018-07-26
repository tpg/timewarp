<img src="https://thepublicgood.io/img/logo.svg" width="200">

# Timewarp

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/702840eb015e449c98d0c9b3d0ce595a)](https://app.codacy.com/app/makers/timewarp?utm_source=github.com&utm_medium=referral&utm_content=open-tpg/timewarp&utm_campaign=badger)

![](https://img.shields.io/badge/license-MIT-blue.svg?longCache=true&style=flat-square)

Timewarp is simple library for dealing with iCalendar objects. The library attempts to adhere to RFC [5545](https://tools.ietf.org/html/rfc5545) and [5546](https://tools.ietf.org/html/rfc5546).

**Timewarp requires PHP 7.0.**

> It's still early days. I'm still working through Timewarp and there's a lot of features and requirements missing. The documentation is as I last left it and might not be up-to-date. Until version 1.0, I cannot make any promises about the quality of the documention, or Timewarp itself, for that matter.  
> However, Timewarp is intended as a core component for tools I am currently working on, so it will be actively developped in the foreseeable future.

---

## Installation

Timewarp can be installed with Composer:

```
composer require thepublicgood/timewarp
```

Or update your `composer.json` file with do a `composer update`:

```json
{
    "require": {
        "thepublicgood/timewarp": "master"
    }
}
```

# Usage

**Note:** Timewarp is pre-v1 and is subject to a lot of changes. I will try to keep this documentation up-to-date, but I can't promise anything until version 1.

An iCalendar object is generally composed of a number of properties and calender components. A calendar object MUST contain at least one calendar component, and will often not contain more than one, although entirely possible.

Timewarp calendars can be created in one of two ways. Either create the calendar object first and add components to it, or create a calendar component and wrap it in a calendar object. You might find the later approach to be a little more semantic when working with a single component.

## Calendar Objects

Create a new calendar object by instantiating the `Calendar` class:

```php
use TPG\Timewarp;

class CalendarController
{
    public function index()
    {
        $calendar = new Timewarp\Calendar();
    }
}
```

Add components to the calendar by calling the `addComponent` method and passing in an instance of a Timewarp component.

### Calendar Properties

All calendars MUST include at least two properties. The first is a `Version` property. You won't need to add a `Version` property yourself as Timewarp will add it when you create a new `Calendar` object.

#### Product Identifier

You are required to add the product identifier to the calendar.

```php
$calendar->addProperty(new Timewarp\Properties\ProdId($productId));
```

The product ID is meant to specify the product that created the iCalendar object, and MUST be globally unique. A common approach to product IDs, take a look at Formal Public Identifiers (ISO.9070.1991).

#### Method

You can specify a method on the calendar. The iCalendar spec does not define any values for the `METHOD` property, so whatever you pass here should have some meaning to your application.

```php
$calendar->addProperty(new Timewarp\Properties\Method($method));
```

No other properties can be added directly to a calendar object and attempting to do so will result in a `FailedConformanceTestException`.

## Creating events

You can create a new event component by instantiating the `Components\Event` class:

```php
use TPG\Timewarp;

class CalendarController
{
    public function index()
    {
        $event = new Timewarp\Components\Event();
    }
}
```

Properties can be added to the component through the `addProperty` method. The `appProperty` method returns the current object so it can be chained. The method accepts a single `Property` object which is any object that inherits from the `Property` class. Timewarp provides most of the standard properties in the `Timewarp\Properties` namespace.

```php
$dtStart = new Timewarp\Properties\Start(new \DateTime('2019-01-01 13:30:00'));
$event->addProperty($dtStart)
    ->addProperty(new Timewarp\Properties\Description('New Years! Yeah!');
```

Add the event component to an existing calendar object:

```php
$calendar->addComponent($event);
```

...or create a new calendar from the component:

```php
$calendar = $event->getCalendar();
```

## A place to start...

```php
$calendar = Timewarp\Calendar::event()->from(2018, 3, 1)->forHours(3);
```

## Component Properties

Timewarp provides a class to represent each iCalender property. So the `DTSTART` property. so the `DTSTART` property is represented by the `Start` class, and the `DURATION` property is represented by the `Duration` class.

Many of the iCalendar properties can be added to any of the different components, although a few properties are component specific, and Timwarp will thow a `FailedConformanceTestException` if you try to add a property to component that doesn't support it.

### Attachment Property

An attachment is a representation of a document on a component. Attachments can be added to `Event`, `Todo`, `Journal` and `Alarm` components.

Unlike the other property classes, Timewarp provides two separate classes to represent attachments. The `UriAttachment` and `BinaryAttachment` properties.

```php
// UriAttachment represents a URI to a file resource
$attachment = new Timewarp\Properties\UriAttachment('https://example.com/picture.png', 'image/png');

// While BinaryAttachment will base64 encode a file and include it in the component
$attachment = new Timewarp\Properties\BinaryAttachment($filePath);
```

`BinaryAttachment` will automatically determine the mime-type if a file is passed in. you can, however, pass in your own base64 encoded string and include the mime-type as the second parameter.

### Categories Property
A category is a simple text string which can be used to categorize iCalendar components. The RFC 5545 document states that "categories are useful in searching for calendar components of a particular type".

The Categories property allow for multiple values, so you can pass in an array of values:

```php
$category = new Timewarp\Properties\Categories(['APPOINTMENTS', 'EDUCATION']);
```

### Classification Property
The classification property forms part of the general security within a calendar application. It allows the application to specify the accessability others have to the information in the object.

Timewarp allows one of three values to be set as the classification. `PUBLIC`, `PRIVATE` or `CONFIDENTIAL`. Timewarp provides these values as class constants as well:

```php
$class = new Timewarp\Properties\Classification(Timewarp\Properties\Classification::PRIVATE);

// or...
$class = new Timewarp\Properties\Classification('PUBLIC');
```

### Comment Property
A simple comment that can be included in the calendar object and provides information to the calendar user.

```php
$comment = new Timewarp\Properties\Comment('Add a comment to a calendar object');
```

Calendar object lines should never exceed 75 octets. Comments will automatically be broken up across multiple lines as needed.

### Description Property

### Geographic Property

### Location Property

### Percent Complete Property

### Priority Property

### Resources Property

### Status Property

### Summary Property

### Start Date

Represents the starting date and time of the component. This property can be added to `Event`, `Todo` and `FreeBusy` components.

The `Start` property accepts a standard PHP `DateTime` object:

```php
$start = new Timewarp\Properties\Start(new \DateTime('2019-01-01 13:30:00'));

// Libraries like Carbon extend DateTime, so you can also do:
$start = new Timewarp\Properties\Start(Carbon::create(2019, 1, 1));
```


### End Date

The `End` property is exactly the same as the `Start` property, but represents when a component is supposed to end.

```php
$end = new Timewarp\Properties\End(new \DateTime('2019-01-01 19:30:00'));
```

