<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
    $showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color				= $this->params->get('templatecolor');
$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
    if (!is_array($files)):
        $files = array($files);
    endif;
    foreach($files as $file):
        $doc->addStyleSheet($file);
    endforeach;
endif;

$doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
if ($this->direction == 'rtl') {
    $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
    if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
        $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
    }
}

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Музей</title>
    <link rel="stylesheet" type="text/css" href="templates/Museum/css/styles.css" />
    <jdoc:include type="head" />

    <link rel="stylesheet" href="/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="/templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="/templates/<?php echo $this->template; ?>/templates/Museum/css/styles.css" type="text/css" />


    <script type="text/javascript">
        var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
        var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
        var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN', true); ?>';
        var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE', true); ?>';
        var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
        var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
        var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN', true); ?>';
        var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE', true); ?>';
        var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE', true); ?>';
        var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER', true); ?>';
        var reset='<?php echo JText::_('TPL_BEEZ2_RESET', true); ?>';
        var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER', true); ?>';
        var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE', true); ?>';
        var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT', true); ?>';
        var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE', true); ?>';
    </script>

</head>

<body>

<div class="wrapper">
    <div class="header">
        <ul class="language">
            <li><a href="#">ua</a></li>
            <li><a href="#">en</a></li>
            </ul>
                <span class="logo">
                    <a href="#"><img src="/templates/Museum/images/logo.png" alt="logo" />
                    </span>
                    </a>

                    <?php if ($logo): ?>
                        <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>" />
                    <?php endif;?>
                    <?php if (!$logo ): ?>
                        <?php echo htmlspecialchars($templateparams->get('sitetitle'));?>
                    <?php endif; ?>
                    <span class="name">Черкаський Музей Археології<br />Середньої Наддніпрянщини</span>

            <!-- end logoheader -->
            <ul class="menu-head">
                <jdoc:include type="modules" name="position-0" />
                </ul>
                    </div>

            <div class="sidebar">
                <form>
                    <input type="search" name="search" placeholder="Пошук">
                </form>
                <ul class="sidebar-menu">
                    <li class="active">
                        <jdoc:include type="modules" name="position-7" />
                       </li>
                    </ul>
            </div>

    <div class="content">
        <img src="/templates/Museum/images/main-pic.png" alt="picture" />
        <h2>«Вже давно відомо»</h2>
        <p>Вже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на оповідний. Багато програм верстування та веб-дизайну використовують Lorem Ipsum як зразок і пошук за терміном "lorem ipsum" відкриє багато веб-сайтів, які знаходяться ще в зародковому стані. Різні версії Lorem Ipsum з'явились за минулі роки, деякі випадково, деякі було створено зумисно (зокрема, жартівливі)
        <span class="further"><a href="#">Далі</a></span>
        <h1>Події</h1>
        <ul class="news">
            <li>
                <img src="/templates/Museum/images/pic.png" alt="pic" />
                    <div id="top"><jdoc:include type="modules" name="position-12"   />
                    <span class="further"><a href="#">Далі</a></span>
                </p>
            </li>
        </ul>

            <?php if ($navposition=='left' and $showleft) : ?>



            <?php endif; ?>

            <div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>

                <div id="main">

                    <?php if ($this->countModules('position-12')): ?>
                        <div id="top"><jdoc:include type="modules" name="position-12"   />
                        </div>
                    <?php endif; ?>

                    <jdoc:include type="message" />
                    <jdoc:include type="component" />

                </div><!-- end main -->

            </div><!-- end wrapper -->

            <?php if ($showRightColumn) : ?>
                <h2 class="unseen">
                    <?php echo JText::_('TPL_BEEZ2_ADDITIONAL_INFORMATION'); ?>
                </h2>
                <div id="close">
                    <a href="#" onclick="auf('right')">
                                                        <span id="bild">
                                                                <?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE'); ?></span></a>
                </div>


                <div id="right">
                    <a id="additional"></a>
                    <jdoc:include type="modules" name="position-6" style="beezDivision" headerLevel="3"/>
                    <jdoc:include type="modules" name="position-8" style="beezDivision" headerLevel="3"  />
                    <jdoc:include type="modules" name="position-3" style="beezDivision" headerLevel="3"  />
                </div><!-- end right -->
            <?php endif; ?>

            <?php if ($navposition=='center' and $showleft) : ?>

                <div class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav" >

<!--                    <jdoc:include type="modules" name="position-7"  style="beezDivision" headerLevel="3" />-->
                    <jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
                    <jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />


                </div><!-- end navi -->
            <?php endif; ?>

        <div class="footer">
            <p>&copy; Черкаський археологічний музей 2000-2013. При повному чи частковому використанні матеріалів посилання на сайт "ЧАМ" обовязкове. Дизайн сайту розроблено GeekHub і модернізований "ЧАМ".
            </p>
        </div>
        </div><!-- end footer -->

    </div>


</body>
</html>
