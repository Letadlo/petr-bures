<?php //netteCache[01]000407a:2:{s:4:"time";s:21:"0.89125900 1352735578";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:85:"/home/opravil.jan/NetBeansProjects/petr-bures/app/FrontModule/templates/@layout.latte";i:2;i:1352733790;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: /home/opravil.jan/NetBeansProjects/petr-bures/app/FrontModule/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '3kkezf3pyc')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb9787328514_head')) { function _lb9787328514_head($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Petr Bureš focení Vašich akcí" />
        <meta name="robots" content="index,follow" />
        <meta name="author" content="Project: Opravil Jan" />
        <meta name="author" content="Graphic: Opravil Jan" />
        <meta name="author" content="Coding: Opravil Jan" />
        <meta name="author" content="Programming: Opravil Jan" />
        <meta name="copyright" content="petr-bures.com" />
        <meta name="googlebot" content="index,follow,snippet,archive" />
        <meta name="keywords" content="petr bures, fotografie, fotky, photos, akce, kluby" />
        <meta name="autosize" content="off" />
<?php if (isset($_l->blocks["metaDescription"])): Nette\Latte\Macros\UIMacros::callBlock($_l, 'metaDescription', $template->getParameters()) ;else: ?>
            <meta name="description" content="Petr Bureš - focení vašich akcí" />
<?php endif ;if (isset($_l->blocks["meta"])): Nette\Latte\Macros\UIMacros::callBlock($_l, 'meta', $template->getParameters()) ;endif ?>
        <title><?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'title', $template->getParameters()) ?></title>

        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/layout.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/paginator.css" type="text/css" media="all" />

        <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" type="image/x-icon" />


        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-1.4.2.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.bgpos.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/coin-slider.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/script.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/script_menu.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bgstretcher.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //  Initialize Backgound Stretcher
                $(document).bgStretcher({
                    images: ['/images/sample_1.jpg'], imageWidth: 1400, imageHeight: 1650
                });
            });
        </script>

        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/cufon-yui.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/cufon-replace.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/Khmer_UI_400.font.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/Tw_Cen_MT_Condensed_400.font.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/FeliciaExtended_italic_400.font.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/FeliciaExtended_italic_400.font.js" type="text/javascript"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/js/myriad-cond_400.font.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
        <script type="text/javascript">
            preloadImages([
                '/images/bg.gif', 
                '/images/slider_button_act.gif'
            ]);
        </script>
        <!--[if IE 6]>
            <script src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js" type="text/javascript"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="<?php echo Nette\Templating\Helpers::escapeHtmlComment($basePath) ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
<?php $iterations = 0; foreach ($flashes as $flash): ?>	<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\CoreMacros::includeTemplate('header.latte', get_defined_vars(), $_l->templates['3kkezf3pyc'])->render() ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ;Nette\Latte\Macros\CoreMacros::includeTemplate('footer.latte', get_defined_vars(), $_l->templates['3kkezf3pyc'])->render() ?>
        <script type="text/javascript"> Cufon.now(); </script>
        <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-33854653-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        </script>
</body>
</html>