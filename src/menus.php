<?php

return array(
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
          , '/docs/deploy'         => '!signal Deployment'
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
