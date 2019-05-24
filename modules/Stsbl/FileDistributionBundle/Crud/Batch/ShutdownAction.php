<?php
// src/Stsbl/FileDistributionBundle/Batch/ShutdownAction.php
namespace Stsbl\FileDistributionBundle\Crud\Batch;

use Doctrine\Common\Collections\ArrayCollection;
use IServ\ComputerBundle\Security\Privilege;
use IServ\CrudBundle\Crud\Batch\GroupableBatchActionInterface;

class ShutdownAction extends AbstractFileDistributionAction implements GroupableBatchActionInterface
{
    use Traits\NoopFormTrait;
    
    protected $privileges = Privilege::BOOT;

    public function getName()
    {
        return 'shutdown';
    }

    public function getLabel()
    {
        return _('Shutdown');
    }

    public function getTooltip()
    {
        return _('Shuts the selected computers down.');
    }

    public function getListIcon()
    {
        return 'off';
    }

    public function getGroup()
    {
        return _('Start & Shutdown');
    }

    public function execute(ArrayCollection $entities)
    {
        $messages = [];
        
        foreach ($entities as $key => $entity) {
            $messages[] = $this->createFlashMessage('success', __('Sent shutdown command to %s.', (string)$entity->getName()));
        }
        
        $bag = $this->getFileDistributionManager()->shutdown($entities);
        // add messages created during work
        foreach ($messages as $message) {
            $bag->add($message);
        }
        
        return $bag;
    }
}
