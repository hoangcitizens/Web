<?php
class Pager {
    public $totalItems;
    public $itemsPerPage;
    public $currentPage;

    public function __construct($totalItems, $itemsPerPage, $currentPage) {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
    }

    public function getStartIndex() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getTotalPages() {
        return ceil($this->totalItems / $this->itemsPerPage);
    }

    public function renderPaginationLinks() {
        $totalPages = $this->getTotalPages();
        $pagination = "<div class='pagination'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $this->currentPage) {
                $pagination .= "<strong>$i</strong> ";
            } else {
                $pagination .= "<a href='?page=$i'>$i</a> ";
            }
        }
        $pagination .= "</div>";
        return $pagination;
    }
}
?>
