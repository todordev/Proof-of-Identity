<?php
/**
 * @package      ProofOfIdentity
 * @subpackage   Components
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2015 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      GNU General Public License version 3 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * ProofOfIdentity Html Helper.
 * The methods generates HTML code based on Bootstrap 3
 * because they are used on front-end.
 *
 * @package        ProofOfIdentity
 * @subpackage     Components
 * @since          1.6
 */
abstract class JHtmlIdentityProof
{
    /**
     * Display an icon for state.
     *
     * @param integer $value
     * @param string $iconPending
     * @param string $iconOk
     * @param string $iconWarning
     *
     * @return string
     */
    public static function state($value, $iconPending = "glyphicon-time", $iconOk = "glyphicon-ok-circle", $iconWarning = "icon-trash")
    {
        $html = '<button class="btn btn-default btn-xs hasTooltip" title="{TITLE}"><span class="glyphicon {ICON}"></span></button>';

        switch ($value) {

            case 1: // Reviewed Successfully.
                $html = str_replace("{ICON}", $iconOk, $html);
                $html = str_replace("{TITLE}", JText::_("COM_IDENTITYPROOF_TOOLTIP_REVIEWED"), $html);
                break;

            case -2: // Warning.
                $html = str_replace("{ICON}", $iconWarning, $html);
                $html = str_replace("{TITLE}", JText::_("COM_IDENTITYPROOF_TOOLTIP_TRASHED"), $html);
                break;

            default: // Pending
                $html = str_replace("{ICON}", $iconPending, $html);
                $html = str_replace("{TITLE}", JText::_("COM_IDENTITYPROOF_TOOLTIP_PENDING"), $html);
                break;
        }

        return $html;

    }

    /**
     * Display an icon for note.
     *
     * @param integer $fileId
     *
     * @return string
     */
    public static function note($fileId)
    {
        $html = '
        <button class="btn btn-default btn-xs hasTooltip js-iproof-btn-note" data-file-id="'.(int)$fileId.'" title="'.JText::_("COM_IDENTITYPROOF_TOOLTIP_NOTE_BUTTON").'">
            <span class="glyphicon glyphicon-envelope"></span>
        </button>
        ';

        return $html;
    }
}
