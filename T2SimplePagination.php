<?php

/**
 * Name: T2SimplePagination
 * Description: The simplest PHP Pagination library
 * Author: Fatima Aurelia
 * GitHub URI: https://github.com/faurelia/t2-simple-pagination
 * Version: 1.0
 */
class T2SimplePagination
{
    public $offset = 0;      // the current record pointer
    public $num_page = 0;    // the total number of pages
    public $page = 1;        // the current page
    public $total;           // the total number of records to be paginated
    public $per_page;        // the number of items to display per page
    public $range;           // the number of page links to display
    public $next_page;       // the next page if `page` is not equals to `num_page`
    public $prev_page;       // the previous page if `page` is not 1
    public $min_page;        // the start page in the page links
    public $max_page;        // the end page in the page links

    /**
     * Initialize and calculate the pagination.
     *
     * @param $total            - the total number of records to be paginated
     * @param int $page         - the current page, default: 1
     * @param int $per_page     - the number of items per page, default: 10
     * @param int $range        - the number of page links to display, default: 5
     *
     * @throws Exception
     */
    public function __construct($total, $page, $per_page = 10, $range = 5)
    {
        $this->setTotal($total);
        $this->setPage($page);
        $this->setPerPage($per_page);
        $this->setRange($range);
        $this->paginate();
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setPage($page)
    {
        // since $page is from the query string, make sure it has a positive int value
        if ($page > 0) $this->page = (int) $page;
    }

    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    public function setRange($range)
    {
        $this->range = $range;
    }

    protected function calcMinPage()
    {
        return max(min($this->page - floor($this->range / 2), ($this->num_page + 1) - $this->range), 1);
    }

    protected function calcMaxPage()
    {
        return min(max($this->page + floor($this->range / 2), $this->range), $this->num_page);
    }

    protected function paginate()
    {
        if ($this->total > $this->per_page) {
            $this->num_page = ceil($this->total / $this->per_page);
        }

        // there are pages and it's not the last one
        if ($this->num_page && $this->num_page > $this->page) {
            $this->next_page = $this->page + 1;
        }

        if ($this->num_page && $this->page > 1) {
            $this->prev_page = $this->page - 1;
        }

        $this->offset = $this->per_page * ($this->page - 1);

        $this->min_page = $this->calcMinPage();
        $this->max_page = $this->calcMaxPage();
    }
}


