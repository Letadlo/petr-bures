<?php //netteCache[01]000415a:2:{s:4:"time";s:21:"0.98021800 1352735732";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:93:"/home/opravil.jan/NetBeansProjects/petr-bures/app/FrontModule/templates/Default/default.latte";i:2;i:1352735731;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: /home/opravil.jan/NetBeansProjects/petr-bures/app/FrontModule/templates/Default/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'q0qaga2tlq')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb47979a23b8_title')) { function _lb47979a23b8_title($_l, $_args) { extract($_args)
?>    Petr Bureš
<?php
}}

//
// block metaDescription
//
if (!function_exists($_l->blocks['metaDescription'][] = '_lb608a4e53b6_metaDescription')) { function _lb608a4e53b6_metaDescription($_l, $_args) { extract($_args)
?>    <meta name="description" content="Aktuální akce
        { foreach $events as $event}
            { $event->getName()} - <?php echo htmlSpecialChars($event->getDate()->format("d. m. Y")) ?>

        { /foreach}
    " />
<?php
}}

//
// block slide
//
if (!function_exists($_l->blocks['slide'][] = '_lb000a47a761_slide')) { function _lb000a47a761_slide($_l, $_args) { extract($_args)
?>        <div class="row-slider clear">
            <div id="coin-slider">
<?php $iterations = 0; foreach ($slidePictures as $picture): $_ctrl = $_control->getComponent("slide-".$picture->getIdPicture()); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;$iterations++; endforeach ?>
            </div>
        </div>
        <div class="extra-img">
            <a class="link-top" href="<?php echo htmlSpecialChars($_control->link("Event:week")) ?>
"><span class="text11">Akce</span><br  />aktuálního<br  /><span class="text11">týdne</span></a>
        </div>
    </div>
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb49d9df2076_content')) { function _lb49d9df2076_content($_l, $_args) { extract($_args)
?><div class="main" id="page1">
    <section id="content">
        <article>
            <div class="inside">
                <div class="content clear">
                    <div class="maxheight col-1 bg-col">
                        <div class="col-indentb">
                            <div class="clear">
                                <h3>Petr Bureš</h3>
                                <div class="indent-text">
                                    <strong>fotograf pro Vaše akce.</strong>
                                    <p class="indent-top"></p>
                                    <!--<p class="button-indent11"><a href="#" class="button">read more</a></p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="maxheight col-2 bg-col">
                        <div class="col-indenta">
                            <div class="clear">
                                <ul class="list1">
                                    <li class="extra-indent-list">
                                        <a href="#">
                                            <span class="marker1 marker">Twitter</span>
                                            <span class="list1-text">twitter.com/requested/petr-bures</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://www.facebook.com/profile.php?id=785754439" rel="external">
                                            <span class="marker2 marker">facebook</span>
                                            <span class="list1-text">facebookcom/petr-bures</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:foto@petr-bures.com">
                                            <span class="marker3 marker">email</span>
                                            <span class="list1-text">foto@petr-bures.com</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="gallery">
                    { foreach $events as $event}
                    { if ($iterator->counter % 4) == 0}
                        <div class="right-none">
<?php $_ctrl = $_control->getComponent("eventPreview-".$event->getIdEvent()); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
                        </div>
                    { else}
<?php $_ctrl = $_control->getComponent("eventPreview-".$event->getIdEvent()); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
                    { /if}
                { /foreach}
                </ul>
            </div>
        </article>  
    </section>
</div>
<?php
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['metaDescription']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['slide']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 