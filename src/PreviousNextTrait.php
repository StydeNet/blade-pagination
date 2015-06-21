<?php

namespace Styde\BladePagination;

trait PreviousNextTrait {

    protected function getPrevious()
    {
        if ($this->paginator->currentPage() <= 1) {
            return null;
        }

        return $this->paginator->url($this->paginator->currentPage() - 1);
    }

    protected function getNext()
    {
        if ( ! $this->paginator->hasMorePages()) {
            return null;
        }

        return $this->paginator->url($this->paginator->currentPage() + 1);
    }

} 