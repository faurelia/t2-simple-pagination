T2 Simple Pagination
==========================

A Simple PHP Pagination library (with Bootstrap 3 example)

## Installation
```php
require_once '/path/to/t2-simple-pagination/T2SimplePagination.php';
```

## Usage
Initialize `T2SimplePagination` providing the 2 required parameters, `total` and `page` as well as additional settings.
```php
// get the current page
$page = isset($_GET['p']) ? $_GET['p'] : 1;

// count total data from your record source. ie: DB or a file
$total = DB::count($data);

// set the number of items to display per page
$per_page = 10;

// set the number of page links to display
$range = 7; // IMPORTANT: please use odd numbers ONLY!!!

$pagination = new T2SimplePagination($total, $page, $per_page, $range);
```

Then extract the records by using the `offset` and `per_page` properties.
```php
$query = "SELECT * FROM my_table LIMIT {$pagination->offset}, {$pagination->per_page}"
```

See the class [Properties](#properties) below for more details.

#### Page Links
```php
<?php for ($i = $pagination->min_page; $i <= $pagination->max_page; $i++): ?>
<a href="?p=<?php echo $i ?>">
    <?php echo $i ?>
</a>
<?php endfor; ?>
```

#### Pager (Next and Prev Links)
```php
<?php if ($pagination->prev_page): ?>
    <a href="?p=<?php echo $pagination->prev_page ?>">Prev</a>
<?php else: ?>
    Prev
<?php endif; ?>

<?php if ($pagination->next_page): ?>
    <a href="?p=<?php echo $pagination->next_page ?>">Next</a>
<?php else: ?>
    Next
<?php endif; ?>
```
You may want to hide the pagination links when there is only one page, so it is recommended to enclose the above codes inside this if block:
```php
<?php if ($pagination->num_page): ?>
    // pager or page links
<?php endif; ?>
```

For Bootstrap 3 example, please check the [index.php](https://github.com/faurelia/t2-simple-pagination/blob/master/index.php) file included in this repository.

## Properties

Variables | Description
----------|---------------------------------------------------------------------
total     | the total number of records to be paginated
page      | the current page, default: 1
per_page  | the number of items to display per page, default: 10
num_page  | the total number of pages
offset    | the current record pointer
next_page | the next page if `page` is not equals to `num_page`
prev_page | the previous page if `page` is not 1
range     | the number of page links to display, default: 5 (Note: Use ODD numbers only!)
min_page  | the start page in the page links
max_page  | the end page in the page links

## License
This library is distributed under [MIT](LICENSE) License. © 2017 Fatima Aurelia
