<?php
require 'src/T2SimplePagination.php';
require 'Bookshelf.sample.php';

// Get page if it is set
$page = isset($_GET['p']) ? $_GET['p'] : 1;

// How many items to display per page
$per_page = 5;

$bookshelf = new Bookshelf();
$pagination = new T2SimplePagination($bookshelf->countItems(), $page, $per_page);

$books = $bookshelf->getAll($pagination->offset, $pagination->per_page);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>T2 Simple Pagination</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body style="padding: 0 30px; max-width: 640px;">

<div class="page-header">
    <h1>T2 Simple Pagination <small>by <a href="https://github.com/faurelia/t2-simple-pagination" target="_blank">Fatima A.</a></small></h1>
</div>

<?php if ($books): ?>
    <ul class='list-group'>
        <?php foreach ($books as $book): ?>
        <li class='list-group-item'><?php echo $book ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($pagination->num_page): ?>
    <ul class='pagination'>
        <?php if ($pagination->prev_page): ?>
        <li><a href='?p=<?php echo $pagination->prev_page ?>'>&laquo;</a></li>
        <?php else: ?>
        <li class="disabled"><span>&laquo;</span></li>
        <?php endif; ?>

        <?php for ($i = $pagination->min_page; $i <= $pagination->max_page; $i++): ?>
            <?php if ($pagination->page == $i): ?>
            <li class="active"><a href='?p=<?php echo $i ?>'><?php echo $i ?></a></li>
            <?php else: ?>
            <li><a href='?p=<?php echo $i ?>'><?php echo $i ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($pagination->next_page): ?>
        <li><a href='?p=<?php echo $pagination->next_page ?>'>&raquo;</a></li>
        <?php else: ?>
        <li class="disabled"><span>&raquo;</span></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<hr />
<?php if ($pagination->num_page): ?>
<nav>
    <ul class="pager">
        <?php if ($pagination->prev_page): ?>
            <li class="previous"><a href='?p=<?php echo $pagination->prev_page ?>'>&larr; Prev</a></li>
        <?php else: ?>
            <li class="previous disabled"><a href="#">&larr; Prev</a></li>
        <?php endif; ?>

        <?php if ($pagination->next_page): ?>
            <li class="next"><a href="?p=<?php echo $pagination->next_page ?>">Next &rarr;</a></li>
        <?php else: ?>
            <li class="next disabled"><a href="#">Next &rarr;</a></li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>

</body>
</html>
