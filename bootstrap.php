<?php

    require_once __DIR__ . '/vendor/.composer/autoload.php';

    $sr = Symfony\Component\HttpFoundation\Request::createFromGlobals();

    $menus = array(
        'main' => array(
            '/'      => 'Home'
          , '/docs/'  => 'Documentation'
          , '/api/namespace-Ratchet.html' => 'API Docs'
          , '/demos' => 'Demos'
          , 'https://groups.google.com/forum/#!forum/ratchet-php' => 'Mailing List'
        )

      , 'docs' => array(
            'init' => array(
                '_title' => 'Getting Started'
              , '/docs/flow'           => 'Process Flow'
              , '/docs/design'         => 'Design Philosophy'
              , '/docs/install'        => 'Installation'
              , '/docs/hello-world'    => 'Hello World!'
              , '/docs/hello-universe' => 'Hello Universe!'
            )

          , 'components' => array(
                '_title' => 'Components'
              , '/docs/websocket' => 'WebSocketComponent'
              , '/docs/sessions'  => 'SessionComponent'
              , '/docs/wamp'      => 'WAMPServerComponent'
              , '/docs/server'    => 'IoServerComponent'
              , '/docs/black'     => 'IpBlackListComponent'
            )
        )

      , 'resources' => array(
//            '_title' => 'Resources'
            'https://groups.google.com/forum/#!forum/ratchet-php' => 'Mailing List'
          , 'https://github.com/cboden/Ratchet/issues' => 'Submit an Issue'
          , 'https://github.com/cboden/Ratchet' => 'Contribute'

        )
    );

    $renderMenu = function($name) use ($menus, $sr) {
        static $nots;
        $nots = function($in) {
            if (substr($in, -1) == '/') {
                $in = substr($in, 0, -1);
            }

            return $in;
        };

        foreach ($menus[$name] as $link => $label) {
            if (is_array($label)) {
                foreach ($label as $clink => $clabel) {
                    if ($clink == '_title') {
                        echo '<li class="nav-header">' . $clabel . '</li>';
                    } else {
                        $class = ($nots($clink) == $nots($sr->getRequestUri()) ? ' class="active"' : '');
                        echo '<li' . $class . '><a href="' . $clink . '">' . $clabel . '</a></li>';
                    }
                }

                continue;
            }

            $class = ($nots($link) == $nots($sr->getBasePath()) ? ' class="active"' : '');
            echo '<li' . $class . '><a href="' . $link . '">' . $label . '</a></li>';
        }
    };