
ABOUT THIS MOUDLE
-----------------

Inspired by Block Class, this module adds additional elements to the block
configuration forms that allow users to assign blocks ARIA landmark roles.

WHAT ARE ARIA LANDMARK ROLES?
-----------------------------

The WAI ARIA specification defines a set of specialised “landmark” roles. These 
roles provide a method to programmatically identify commonly found sections of 
web page content in a consistent way. they can be used now in whatever flavour 
of (X)HTML you prefer. This allows assistive technologies to provide users with 
features which they can use to identify and navigate to sections of page content.

For further information, go to http://www.w3.org/WAI/PF/aria or 
http://www.nomensa.com/blog/2010/wai-aria-document-landmark-roles.

INSTALLATION
------------

See http://drupal.org/documentation/install/modules-themes/modules-6.

USAGE
-----

Within your block.tpl.php, include the following snippet within the opening div
tag:

<?php print $aria_role; ?>

Here is the first line of Garland's block.tpl.php before the code is inserted:

<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">

And here's what the code should look like after adding the snippet:

<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>" <?php print $aria_role; ?>>

IMPORTANT: Remember to separate the PHP snippet from the existing markup with a single space.

AUTHOR
------

Oliver Davies (http://drupal.org/user/381388)
