## PHP Date and Time Essential Training (lynda.com)
### Course Notes

### Ch01 - Handling Dates and Times in PHP

* To deal with the complexity of dates and times, PHP takes a very simple approach:
  * It counts the seconds from a fixed date
  * Dates and time are stored as _timestamps_   
  * Timestamps represent the number of seconds that have elapsed 
  since midnight, London time (GMT timezone), from January 1, 1970
  * This is known as the Unix epoch, and is used as the basis for date and time 
  calculations in most computing environments. 
* PHP stores timestamps internally as 64 bit integers  
* 64 bit timestamps can represent dates up to 290 billion years in the past
 and into the future 
   
#### PHP 4
* **date(), getdate() and strtotime()** functions were introduced in PHP 4
* These functions support 32 bit timestamps on 32 bit systems
* They support 64 bit timestamps on 64 bit systems but only if PHP is compiled
for 64 bit architecture
* For time zone, these functions use the server time zone (as set in php.ini)
   
#### PHP 5+
* Provides **DateTime** class 
  * Supports 64 bit timestamps even on 32 bit systems  
  * Time zone can be set independent of server time zone
  
#### Time Zone Support
* Timestamps are based on GMT time zone
* Timestamp = 0 translates to _Thursday, January 1, 1970 12:00:00 AM GMT_
* GMT is Greenwich Mean Time and is a time zone 
  * GMT is often interchanged with UTC (Coordinated Universal Time)
  * UTC though is a time standard and **_not_** a time zone
* PHP uses an internal database to calculate local offset
* Daylight saving time is applied automatically

##### References
* Time zones are defined by IANA see https://www.iana.org/time-zones
* https://php.net/manual/en/timezones.php
* https://www.epochconverter.com/

### Ch02 - Basic Date and Time Functions
* **date(), getdate() and strtotime()** functions were introduced in PHP 4

#### Display current date and time
* Use **_date()_** function
  * Displays date/time based on timestamp and timezone
  * Uses PHP configured time zone 
    * Set in php.ini
    * ini_set('date.timezone', 'timezone')
    * date_default_timezone_set('timezone')
  * Does take into account daylight savings time
  
#### Check date validity
* Use **_checkdate()_** function

#### Timing script duration
* Use **_microtime()_** function
  * Provides microsecond resolution
  
#### Create timestamp for a specific date or time
* Use **_mktime()_** or **_gmmktime()_** function
* mktime() calculates timestamp based on local date/time (i.e takes timezone into account)
* gmktime() does calculate timestamp based on GMT date/time (i.e timezone independent)

#### Create a timestamp from text
* Use **_strtotime()_** function

```php
$ts = strtotime('7/4/2015');
echo date('F j, Y', $ts);

```

### Ch03 - Using the DateTime class
* **_DateTime_** class was introduced in PHP 5.2
* Advantages over PHP 4 provided functions
  * DateTime objects store time zone information
  * Time zone can be different from server default (_i.e as set in php.ini_)
  * Supports 64 timestamps even on 32 bit systems
  * Can parse English date and time strings like strtotime()
  * Provides error details why specific string failed to parse
  * Provides dedicated methods for performing date and time calculations
  
#### Display date  
```php
$now = new DateTime();
$format = 'g:i a, l, F j, Y';
echo $now->format($format);
```
#### Get timestamp

```php
// Get timestamp
$ts = $date->getTimestamp();
echo $ts;

```
#### Ways to get timestamp

* time()
  * Get current timestamp
* strtotime()
  * Get timestamp from date
  * On 32 bit machine supports dates 1901 - 2038
  * On 64 bit machine supports any date
* DateTime::getTimestamp()
  * Get timestamp from date
  * On 32 bit machine supports dates 1901 - 2038
   * On 64 bit machine supports any date
* Date::format('U')
  * Get timestamp from date
  * Returns timestamp as string
  * On 32 or 64 bit machine supports any date

### Ch04 - Working with Time Zones
#### Get time zone

```php
// Show default time zone
$date = new DateTime();
$tz = $date->getTimezone();
echo $tz->getName();

OR 

echo $date->getTimezone()->getName();

```

#### Create date with specific time zone
```php
$date = new DateTime('Asia/Tokyo');
echo 'Date : ' . $date->format('g:i a, F j, Y') . '<br>';

$date = new DateTime('12/25/2015 1200 America/Chicago');
echo 'Date : ' . $date->format('g:i a, F j, Y') . '<br>';

$tokyo = new DateTimeZone('Asia/Tokyo');
$date = new DateTime('12/25/2015 1200', $tokyo);
echo 'Date : ' . $date->format('g:i a, F j, Y') . '<br>';
```

### Ch05 - Using the DateInterval and DatePeriod classes
_TBD_

### Ch06 - Working with ISO Week Dates
_TBD_

### Ch07 - Calculating Sunrise and Sunset
_TBD_

#### Ch08 - Dates and Databases

* PHP stores dates as Unix timestamps
* MySQL and MariaDB store dates in a human readable format (defined by ISO)
  * DATETIME column
    * YYYY-MM-DD HH:MM:SS
  * TIMESTAMP column  (doesn't store Unix timestamp)
      * YYYY-MM-DD HH:MM:SS  
  * DATE column
    * YYYY-MM-DD
  * Use BIGINT or INT for PHP timestamp  
  
#### Formatting Dates from a Database
* Pass value from DB into DateTime() or strtotime()
* Use MySQL date functions
  * In most cases using DB functions are more efficient than using PHP