<iframe
    id="adminer_frame"
    name="adminer_frame"
    src="<?= URLHelper::getURL($url, array('username' => $GLOBALS['DB_STUDIP_USER'], 'db' => $GLOBALS['DB_STUDIP_DATABASE'])) ?>"
    width="100%"
    height="620"
    frameborder="0">
    <p>Your browser does not support iframes.</p>
</iframe>

<script>
    jQuery(function () {
        window.setInterval(function () {
            jQuery('#adminer_frame').attr("height", jQuery(window.document.getElementById('adminer_frame').contentWindow.document).height() + "px");
            jQuery('#adminer_frame').attr("width", jQuery(window.document.getElementById('adminer_frame').contentWindow.document).width() + "px");
        }, 500);
    });
</script>