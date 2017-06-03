<img src="https://thepublicgood.io/img/logo.svg" width="200">

# Timewarp

![](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)

Timewarp is simple library for dealing with iCalendar objects. The library attempts to adhere to RFC [5545](https://tools.ietf.org/html/rfc5545) and [5546](https://tools.ietf.org/html/rfc5546).

**Timewarp requires PHP 7.0.**

> It's still early days. I'm still working through Timewarp and there's a lot of features and requirements missing. The documentation is as I last left it and might not be up-to-date. Until version 1.0, I cannot make any promises about the quality of the documention, or Timewarp itself, for that matter.  
> However, Timewarp is intended as a core component for tools I am currently working on, so it will be actively developped in the foreseeable future.

---

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
$dtStart = new Timewarp\Properties\DtStart(new \DateTime('2019-01-01 13:30:00'));
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

## Properties

Many of the properties you can add to any of the different components, although a few properties are component specific.

Adding a property to a component that doesn't support it will cause Timewarp to throw a `FailedConformanceTestException`.

### Attachment

An attachment is a representation of a document on a component. Attachments can be added to `Event`, `Todo`, `Journal` and `Alarm` components.

Timewarp provides two separate properties to represent attachments. The `UriAttachment` and `BinaryAttachment` properties.

```php
// UriAttachment represents a URI to a file resource
$attachment = new Timewarp\Properties\UriAttachment('https://example.com/picture.png', 'image/png');

// While BinaryAttachment will base64 encode a file and include it in the component
$attachment = new Timewarp\Properties\BinaryAttachment($filePath);
```

`BinaryAttachment` will automatically determine the mime-type if a file is passed in. you can, however, pass in your own base64 encoded string and include the mime-type as the second parameter.

### Start Date

Represents the starting date and time of the component. This property can be added to `Event`, `Todo` and `FreeBusy` components.

The `DtStart` property accepts a standard PHP `DateTime` object:

```php
$start = new Timewarp\Properties\DtStart(new \DateTime('2019-01-01 13:30:00'));

// Libraries like Carbon extend DateTime, so you can also do:
$start = new Timewarp\Properties\DtStart(new Carbon::create(2019, 1, 1));
```


### End Date

The `DtEnd` property is exactly the same as the `DtStart` property, but represents when a component is supposed to end.

```php
$end = new Timewarp\Properties\DtEnd(new \DateTime('2019-01-01 19:30:00'));
```

