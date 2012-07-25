<?php

    require_once __DIR__ . '/vendor/autoload.php';

    $sr = Symfony\Component\HttpFoundation\Request::createFromGlobals();

function wamp() {
    echo '<abbr title="WebSocket Application Messaging Protocol">WAMP</abbr>';
}

    $menus = array(
        'main' => array(
            '/'      => 'Home'
          , '/docs/'  => 'Documentation'
          , '/api/namespace-Ratchet.html' => 'API Docs'
          , '/demo' => 'Demo'
          , 'https://groups.google.com/forum/#!forum/ratchet-php' => 'Mailing List'
        )

      , 'docs' => array(
            'init' => array(
                '_title' => 'Getting Started'
              , '/docs/flow'           => '!refresh Process Flow'
              , '/docs/design'         => '!picture Design Philosophy'
              , '/docs/connections' => '!share-alt Connections'
            )

          , 'tutorials' => array(
                '_title' => 'Tutorials'
              , '/docs/install'        => '!download-alt Installation'
              , '/docs/hello-world'    => '!globe Hello World!'
//              , '/docs/hello-universe' => '!tasks Pub/Sub & RPC'
              , '/docs/push'           => '!chevron-right Push Integration'
            )

          , 'components' => array(
                '_title' => 'Components'
              , '/docs/websocket' => '!random WsServer'
              , '/docs/sessions'  => '!user SessionProvider'
              , '/docs/wamp'      => '!road WampServer'
              , '/docs/server'    => '!off IoServer'
              , '/docs/flash'     => '!cog FlashPolicy'
              , '/docs/black'     => '!ban-circle IpBlackList'
            )
        )

      , 'links' => array(
//            '_title' => 'Links'
            'https://groups.google.com/forum/#!forum/ratchet-php' => '!envelope Mailing List'
          , 'https://github.com/cboden/Ratchet/issues' => '!exclamation-sign Submit an Issue'
          , 'https://github.com/cboden/Ratchet' => '!pencil Contribute'

        )
    );

    $renderMenu = function($name) use ($menus, $sr) {
        static $nots, $markup;
        $nots = function($in) {
            if (substr($in, -1) == '/') {
                $in = substr($in, 0, -1);
            }

            return $in;
        };

        $markup = function($link, $label, $active = false) {
            $icon = '';
            if (substr($label, 0, 1) == '!') {
                $icon = '<i class="icon-' . substr($label, 1, strpos($label, ' ')) . '"></i> ';
                $label = substr($label, strpos($label, ' '));
            }

            $class = ($active ? ' class="active"' : '');

            echo "<li{$class}><a href=\"{$link}\">{$icon}{$label}</a></li>";
        };

        foreach ($menus[$name] as $link => $label) {
            if (is_array($label)) {
                foreach ($label as $clink => $clabel) {
                    if ($clink == '_title') {
                        echo '<li class="nav-header">' . $clabel . '</li>';
                    } else {
                        $markup($clink, $clabel, $nots($clink) == $nots($sr->getRequestUri()));
/*
                        $class = ($nots($clink) == $nots($sr->getRequestUri()) ? ' class="active"' : '');
                        echo '<li' . $class . '><a href="' . $clink . '">' . $clabel . '</a></li>';
*/
                    }
                }

                continue;
            }

            $path = $sr->getBasePath();
            if (empty($path)) {
                $path = $sr->getRequestUri();
            }

            $markup($link, $label, ($nots($link) == $nots($path)));
/*
            $class = ($nots($link) == $nots($sr->getBasePath()) ? ' class="active"' : '');
            echo '<li' . $class . '><a href="' . $link . '">' . $label . '</a></li>';
*/
        }
    };