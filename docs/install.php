<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9">
            <h2>Installation</h2>

            <section>
                <h3>Composer</h3>

                <p>
                    The best (and currently only) way to install Ratchet is using <a rel="external" href="http://getcomposer.org">composer</a>.
                    Simply add Ratchet as a require in your <em>composer.json</em> file:
                </p>

                <pre class="prettprint">{
    "require": {
        "cboden/Ratchet": "dev-master"
    }
}</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';