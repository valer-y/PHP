<?php

declare(strict_types=1);

namespace App;

use App\Exception\ViewNotFoundException;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make (string $view, array $params = []) {
        return new static ($view, $params);
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }

    public function render() : string
    {
        $viewPath = VIEW_PATH . $this->view . '.php';

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        extract($this->params);

        ob_start();

        include $viewPath;

        return (string) ob_get_clean();
    }
}