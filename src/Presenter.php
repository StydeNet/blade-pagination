<?php

namespace Styde\BladePagination;

use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Contracts\Pagination\Presenter as PresenterContract;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class Presenter implements PresenterContract {

    use PreviousNextTrait, LinksTrait;

    /**
     * @param PaginatorContract $paginator
     * @param UrlWindow $window
     */
    public function __construct(PaginatorContract $paginator, UrlWindow $window = null)
    {
        $this->paginator = $paginator;
        $this->window = is_null($window) ? UrlWindow::make($paginator) : $window->get();
    }

    /**
     * Render the given paginator.
     *
     * @return string
     */
    public function render()
    {
        $data = [
            'current'  => $this->paginator->currentPage(),
            'previous' => $this->getPrevious(),
            'links'    => $this->getLinks(),
            'next'     => $this->getNext()
        ];

        $theme = Config::get('blade-pagination.theme', 'bootstrap');

        return $this->renderTheme($theme, $data);
    }

    /**
     * Determine if the underlying paginator being presented has pages to show.
     *
     * @return bool
     */
    public function hasPages()
    {
        return $this->paginator->hasPages();
    }

    /**
     * @param $theme
     * @param $data
     * @return mixed
     */
    protected function renderTheme($theme, $data)
    {
        $customTemplate = 'blade-pagination/' . $theme;

        if (View::exists($customTemplate)) {
            return View::make($customTemplate, $data)->render();
        }

        return View::make('blade-pagination::' . $theme, $data)->render();
    }

}