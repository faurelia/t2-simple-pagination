<?php

class T2SimplePagination
{
    public $next_page;
    public $prev_page;
    public $total;
    public $page = 1;
    public $per_page = 10;
    public $num_page = 0;
    public $offset = 0;

    public function __construct($page, $per_page, $total) 
    {
        $this->setPage($page);
        $this->setPerPage($per_page);
        $this->setTotal($total);
        $this->calculate();
    }

    public function setPage($page)
    {
        // page is +int
        if ($page > 0) {
            $this->page = (int) $page;
        }
    }

    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function calculate()
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
    }
}


