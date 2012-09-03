<div id="mailbox" data-role="page">
 <?php echo $this->smartmobileHeader(array('backlink' => array('#folders', _("Folders")), 'logout' => true, 'title' => '&nbsp;')) ?>

 <div id="imp-mailbox-navtop" class="ui-bar ui-bar-a center" style="display:none">
  <a href="" id="imp-mailbox-prev" data-inline="true" data-iconpos="notext" data-role="button" data-icon="arrow-l">Previous</a>
  <h2 class="ui-title">&nbsp;</h2>
  <a href="" id="imp-mailbox-next" data-inline="true" data-role="button" data-icon="arrow-r" data-iconpos="notext">Next</a>
 </div>

 <div data-role="content">
  <ul id="imp-mailbox-list" data-role="listview"></ul>
 </div>

 <div data-role="footer" class="ui-bar" data-position="fixed">
  <a href="" id="imp-mailbox-top" data-role="button" data-icon="arrow-u"><?php echo _("Top") ?></a>
<?php if ($this->canCompose): ?>
  <a href="#compose" data-role="button" data-icon="plus"><?php echo _("New Message") ?></a>
<?php endif ?>
<?php if ($this->canSearch): ?>
  <a href="#search" id="imp-mailbox-search" data-role="button" data-icon="search"><?php echo _("Search") ?></a>
<?php endif ?>
 </div>
</div>
