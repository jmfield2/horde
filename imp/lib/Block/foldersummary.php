<?php
/**
 * Copyright 2005-2008 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (GPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * @package Horde_Block
 */

class Horde_Block_imp_foldersummary extends Horde_Block
{
    var $_app = 'imp';

    function _content()
    {
        if (!IMP::checkAuthentication(true)) {
            return '';
        }

        /* Filter on INBOX display, if requested. */
        if ($GLOBALS['prefs']->getValue('filter_on_display')) {
            IMP_Filter::filter('INBOX');
        }

        /* Get list of mailboxes to poll. */
        $imptree = &IMP_IMAP_Tree::singleton();
        $folders = $imptree->getPollList(true, true);

        $anyUnseen = false;
        $newmsgs = array();
        $html = '<table cellspacing="0" width="100%">';

        foreach ($folders as $folder) {
            if (($folder == 'INBOX') ||
                ($_SESSION['imp']['protocol'] != 'pop')) {
                $info = $imptree->getElementInfo($folder);
                if (!empty($info)) {
                    if (empty($this->_params['show_unread']) ||
                        !empty($info['unseen'])) {
                        if (!empty($info['newmsg'])) {
                            $newmsgs[$folder] = $info['newmsg'];
                        }
                        $html .= '<tr style="cursor:pointer" class="text" onclick="DimpBase.go(\'folder:' . htmlspecialchars($folder) . '\');return false;"><td>';
                        if (!empty($info['unseen'])) {
                            $html .= '<strong>';
                            $anyUnseen = true;
                        }
                        $html .= '<a>' . IMP::displayFolder($folder) . '</a>';
                        if (!empty($info['unseen'])) {
                            $html .= '</strong>';
                        }
                        $html .= '</td><td>' .
                            (!empty($info['unseen']) ? '<strong>' . $info['unseen'] . '</strong>' : '0') .
                            (!empty($this->_params['show_total']) ? '</td><td>(' . $info['messages'] . ')' : '') .
                            '</td></tr>';
                    }
                }
            }
        }

        $html .= '</table>';

        if (count($newmsgs) == 0 && !empty($this->_params['show_unread'])) {
            if (count($folders) == 0) {
                $html = _("No folders are being checked for new mail.");
            } elseif (!$anyUnseen) {
                $html = '<em>' . _("No folders with unseen messages") . '</em>';
            } elseif ($GLOBALS['prefs']->getValue('nav_popup')) {
                $html = '<em>' . _("No folders with new messages") . '</em>';
            }
        }

        return $html;
    }

}
