<?php 

namespace Atomic\Application\Models;

class Dialog extends Message
{
    /**
     * Return message with whom and who was 
     * sent message
     * 
     * @param int $userId 
     * 
     * @return array
     */ 
    public function getDialogById($id)
    {
        return $this->select()->columns(
            'dialog_id, whom_login, who_login, message'
        )->where(" dialog_id = '{$id}' ")->get();
    }
}