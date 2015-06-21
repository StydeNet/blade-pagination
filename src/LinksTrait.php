<?php

namespace Styde\BladePagination;

trait LinksTrait {

    public function getLinks()
    {
        $links = array();

        if (is_array($this->window['first'])) {
            $links = $this->window['first'];
        }

        if (is_array($this->window['slider'])) {
            $links += ['first_div' => ''] + $this->window['slider'];
        }

        if (is_array($this->window['last'])) {
            $links += ['last_div' => ''] + $this->window['last'];
        }

        return $links;
    }

} 