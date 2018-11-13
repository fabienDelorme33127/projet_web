<?php

namespace App;

class LayoutException extends \Exception {};

class Layout {
    private $name;

    function __construct($path) {
        $this->setName($path);
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        if (!file_exists($name))
            throw new LayoutException("Layout not found");
        $this->name = $name;
        return $this;
    }

    public function render($name, $params=[]) {
        $view = 'views/' . $name . '.view.php';
        ob_start();
        extract($params);
        require $view;
        $content = ob_get_clean();
        ob_start();
        require $this->name;
        ;		return ob_get_clean() . "\n";
    }
}