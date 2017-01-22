T2 Simple Pagination
==========================

PHP Simple Pagination with Bootstrap 3

## Installation
```php
require 'T2SimplePagination.php';
```

## Usage
Initialize `T2SimplePagination` providing the 3 required parameters: `page`, `per_page` and `total`.

```php
$pagination = new T2SimplePagination($page, $per_page, $total);
```

Then extract the records by using the `offset` and `per_page` properties:
```php
$query = "SELECT * FROM my_table LIMIT {$pagination->offset}, {$pagination->per_page}"
```

#### Page Links
```php
<?php for ($i = 1; $i <= $pagination->num_page; $i++): ?>
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

For Bootstrap 3 example, please check the `index.php` file included in this repository.

## Properties

Variables | Description
----------|---------------------------------------------------------------------
total     | the total number of records to be paginated
page      | the current page, default value is 1
per_page  | number of items per page, default value is 10
num_page  | used to display pager and page links
offset    | used for selecting the records to display in a page
next_page | the next page if `num_page` is not the last page
prev_page | the previous page if `page` is not the first page
