<?php
/**
 * @package      ProofOfIdentity
 * @subpackage   Component
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2016 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      GNU General Public License version 3 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class IdentityproofViewFiles extends JViewLegacy
{
    /**
     * @var JDocumentHtml
     */
    public $document;

    /**
     * @var Joomla\Registry\Registry
     */
    protected $state;

    protected $items;
    protected $pagination;

    protected $option;
    protected $listOrder;
    protected $listDirn;
    protected $saveOrder;

    public $filterForm;
    public $activeFilters;

    protected $sidebar;

    public function display($tpl = null)
    {
        $this->option     = JFactory::getApplication()->input->get('option');

        $this->state      = $this->get('State');
        $this->items      = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Prepare sorting data
        $this->prepareSorting();

        // Prepare actions
        $this->addToolbar();
        $this->addSidebar();
        $this->setDocument();

        parent::display($tpl);
    }

    /**
     * Prepare sortable fields, sort values and filters.
     */
    protected function prepareSorting()
    {
        // Prepare filters
        $this->listOrder = $this->escape($this->state->get('list.ordering'));
        $this->listDirn  = $this->escape($this->state->get('list.direction'));
        $this->saveOrder = (strcmp($this->listOrder, 'a.ordering') === 0);

        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
    }

    /**
     * Add a menu on the sidebar of page
     */
    protected function addSidebar()
    {
        IdentityproofHelper::addSubmenu($this->getName());
        $this->sidebar = JHtmlSidebar::render();
    }

    /**
     * Add the page title and toolbar.
     *
     * @since   1.6
     */
    protected function addToolbar()
    {
        // Set toolbar items for the page
        JToolBarHelper::title(JText::_('COM_IDENTITYPROOF_FILES_MANAGER'));
        JToolbarHelper::editList('file.edit');
        JToolbarHelper::divider();
        JToolBarHelper::custom('files.reviewed', 'ok', '', JText::_('COM_IDENTITYPROOF_REVIEWED'), false);
        JToolBarHelper::custom('files.pending', 'clock', '', JText::_('COM_IDENTITYPROOF_PENDING'), false);
        JToolbarHelper::divider();

        if ((int)$this->state->get('filter.state') === -2) {
            JToolbarHelper::deleteList(JText::_('COM_IDENTITYPROOF_DELETE_ITEMS_QUESTION'), 'files.delete', 'JTOOLBAR_EMPTY_TRASH');
        } else {
            JToolbarHelper::trash('files.trashed');
        }

        JToolbarHelper::divider();
        JToolBarHelper::custom('files.backToDashboard', 'dashboard', '', JText::_('COM_IDENTITYPROOF_DASHBOARD'), false);
    }

    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument()
    {
        $this->document->setTitle(JText::_('COM_IDENTITYPROOF_FILES_MANAGER'));

        // Scripts
        JHtml::_('behavior.multiselect');

        JHtml::_('bootstrap.tooltip');
        JHtml::_('formbehavior.chosen', 'select');

        JHtml::_('prism.ui.pnotify');
        JHtml::_('prism.ui.joomlaHelper');
        JHtml::_('prism.ui.joomlaList');

        $this->document->addScript(JURI::root() . 'media/' . $this->option . '/js/admin/' . JString::strtolower($this->getName()) . '.js');
    }
}
