<!-- footer 1 start-->

<div style="background-color: darkcyan; color: white;">
    <hr>
    <div class="row">
        <div class="col-4">
            <?php if (is_active_sidebar('footer_left')) : ?>
                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar('footer_left'); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>
        </div>
        <div class="col-4">
            <?php if (is_active_sidebar('footer_middle')) : ?>
                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar('footer_middle'); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>
        </div>
        <div class="col-4">
            <?php if (is_active_sidebar('footer_right')) : ?>
                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar('footer_right'); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- footer 1 end-->



<!-- iqus footer start -->
<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
    <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="site-branding" style="color: white;">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                    ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else :
                    ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    $newspaper_theme_description = get_bloginfo('description', 'display');
                    if ($newspaper_theme_description || is_customize_preview()) :
                    ?>
                        <p class="site-description"><?php echo $newspaper_theme_description; ?></p>
                    <?php endif; ?>
                    <hr>

                    <!-- using browser -->
                    <?php
                    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4,
                        $is_safari, $is_chrome, $is_iphone;
                    if ($is_lynx) {
                        echo "You are using Lynx";
                    } elseif ($is_gecko) {
                        echo "You are using Firefox.";
                    } elseif ($is_IE) {
                        echo "You are using Internet Explorer.";
                    } elseif ($is_opera) {
                        echo "You are using Opera.";
                    } elseif ($is_NS4) {
                        echo "You are using Netscape";
                    } elseif ($is_safari) {
                        echo "You are using Safari.";
                    } elseif ($is_chrome) {
                        echo "You are using Chrome.";
                    } elseif ($is_iphone) {
                        echo "You are using an iPhone";
                    }
                    ?>
                    <br>

                    <?php
                    if (wp_is_mobile()) {
                        echo "You are viewing this website on a mobile device.";
                    } else {
                        echo "You are not on a mobile device.";
                    }
                    ?>
                    <br>
                    <?php
                    global $is_apache, $is_IIS;
                    if ($is_apache) {
                        echo "web server is running Apache.";
                    } elseif ($is_IIS) {
                        echo "web server is running IIS.";
                    }
                    ?>
                </div>
            </div>

            <div class="col-6 col-lg-2 offset-lg-1 mb-3 text-white">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#">Home</a></li>
                    <li class="mb-2"><a href="#">Docs</a></li>
                    <li class="mb-2"><a href="#">Examples</a></li>
                    <li class="mb-2"><a href="#">Icons</a></li>
                    <li class="mb-2"><a href="#">Themes</a></li>
                    <li class="mb-2"><a href="#">Blog</a></li>
                    <li class="mb-2"><a href="#" target="_blank" rel="noopener">Swag Store</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3 text-white" >
                <h5>Guides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#">Getting started</a></li>
                    <li class="mb-2"><a href="#">Starter template</a></li>
                    <li class="mb-2"><a href="#">Webpack</a></li>
                    <li class="mb-2"><a href="#">Parcel</a></li>
                    <li class="mb-2"><a href="#">Vite</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3 text-white">
                <h5> দৈনিক ইত্তেফাক: আজকের সর্বশেষ</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="https://www.ittefaq.com.bd/"  target="" rel="noopener">Top News</a></li>
                    <li class="mb-2"><a href="https://www.ittefaq.com.bd/latest-news" target="" rel="noopener">আজকের সর্বশেষ খবর </a></li>
                    <li class="mb-2"><a href="https://www.ittefaq.com.bd/681770/" target="" rel="noopener">পাকিস্তানকে নির্বাচনে অনিয়ম তদন্তের অনুরোধ</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3 text-white">
                <h5>Community</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="http://localhost/newspaper/" target="" rel="noopener">Issues</a></li>
                    <li class="mb-2"><a href="http://localhost/newspaper/" target="" rel="noopener">Discussions</a></li>
                    <li class="mb-2"><a href="http://localhost/newspaper/" target="" rel="noopener">Corporate sponsors</a></li>
                    <li class="mb-2"><a href="http://localhost/newspaper/" target="" rel="noopener">Open Collective</a></li>
                    <li class="mb-2"><a href="http://localhost/newspaper/" target="" rel="noopener">Stack Overflow</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- iqus footer end -->



</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php wp_footer() ?>
</body>

</html>