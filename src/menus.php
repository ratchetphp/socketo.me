<?php

return array(
    'main' => array(
        '/'      => 'Home'
      , '/docs/'  => 'Documentation'
      , '/api/namespace-Ratchet.html' => 'API Docs'
      , '/demo' => 'Demo'
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
//          , '/docs/hello-universe' => '!tasks Hello Universe!'
          , '/docs/push'           => '!chevron-right Push Integration'
          , '/docs/deploy'         => '!signal Deployment'
        )

      , 'troubleshooting' => array(
            '_title' => 'Troubleshooting'
          , 'migration-3' => '!plane Migrating from 0.3'
          , 'troubleshooting' => '!question-sign Help Me!'
        )

      , 'components' => array(
            '_title' => 'Server Components'
          , '/docs/websocket' => '!th-large WsServer'
          , '/docs/wamp'      => '!road WampServer'
          , '/docs/sessions'  => '!user SessionProvider'
          , '/docs/server'    => '!off IoServer'
          , '/docs/http'      => '!file HttpServer'
          , '/docs/router'    => '!hand-left Router'
          , '/docs/origin'    => '!eye-open OriginCheck'
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
