# Fluents
Laravel extension to convert to/from Fluent objects.

## Rationale

The Laravel Fluent object is one of the most under-rated and under-utilized components of the
framework. Essentially a free-standing object, it allows you to access an array of attributes
as an object rather than as an array.

example:

Instead of using an array like this:

```php
$myArray = [];
$myArray['first'] = 'one';
$myArray['second'] = 'two;

echo $myArray['first']; // prints "one"
```

Use fluent object like this:

```php
$myObject = new Fluent();
$myObject->first = 'one';
$myObject->second = 'two';

echo $myObject->first; // prints "one"
```

Until now, however, there has been no standard straightforwards way to convert an Eloquent
Model object into a Fluent object. There is a toArray() function on a Model object but
no equivalent toFluent() function.

This component adds such functions using a trait that can be applied to any model object.
Note that several other of Laravel's internal classes can also have this trait applied,
as long as they store their data in an internal `attributes` array this trait should
work.

## Usage

