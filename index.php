<?php
require 'T2SimplePagination.php';
require 'Bookshelf.sample.php';

// Get page if it is set
$page = isset($_GET['p']) ? $_GET['p'] : 1;

$bookshelf = new Bookshelf();
$pagination = new T2SimplePagination($page, 5, $bookshelf->countItems());

$books = $bookshelf->getAll($pagination->offset, $pagination->per_page);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>T2 Simple Pagination</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="padding: 20px;">

<div class="page-header">
    <h1>T2 Simple Pagination</h1>
    <h3>PHP Simple Pagination with Bootstrap 3</h3>
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

    <?php for ($i = 1; $i <= $pagination->num_page; $i++): ?>
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

</body>
</html>
