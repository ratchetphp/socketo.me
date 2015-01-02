<?php

namespace Ratchet;

use Symfony\Component\HttpFoundation\Request;

class Menu
{
    private $request;
    private $menus;

    public function __construct(Request $request, array $menus)
    {
        $this->request = $request;
        $this->menus = $menus;
    }

    public function render($name)
    {
        $nots = function ($in) {
            if (substr($in, -1) == '/') {
                $in = substr($in, 0, -1);
            }

            return $in;
        };

        $markup = function ($link, $label, $active = false) {
            $icon = '';
            if (substr($label, 0, 1) == '!') {
                $icon = '<i class="glyphicon glyphicon-' . substr($label, 1, strpos($label, ' ')) . '"></i> ';
                $label = substr($label, strpos($label, ' '));
            }

            $class = ($active ? ' class="active"' : '');

            echo "<li{$class}><a href=\"{$link}\">{$icon}{$label}</a></li>";
        };

        foreach ($this->menus[$name] as $link => $label) {
            if (is_array($label)) {
                foreach ($label as $clink => $clabel) {
                    if ($clink == '_title') {
                        echo '<li class="nav-header">' . $clabel . '</li>';
                    } else {
                        $markup($clink, $clabel, $nots($clink) == $nots($this->request->getRequestUri()));
                    }
                }

                continue;
            }

            $path = $this->request->getBasePath();
            if (empty($path)) {
                $path = $this->request->getRequestUri();
            }

            $active = ($nots($link) == $nots($path) || (strlen($link) > 1 && substr($link, -1) == '/' && substr($this->request->getRequestUri(), 0, strlen($link)) == $link));
            $markup($link, $label, $active);
        }
    }
}
