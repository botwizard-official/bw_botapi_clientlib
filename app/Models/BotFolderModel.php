<?php

namespace BotapiClient\Models;

class BotFolderModel extends AbstractModel {

    /**
     * 
     * @param string $name
     * @param bool $visible
     * @return int Created Folder ID
     */
    public function createFolder($name, $visible = true) {
        $params = [
            'name' => strval($name),
            'visible' => $visible ? 'Y' : 'N',
        ];
        return parent::call('bot.folder.create', $params);
    }

    /**
     * 
     * @param int $id
     * @return void
     */
    public function removeFolder($id) {
        $params = [
            'id' => intval($id),
        ];
        return parent::call('bot.folder.delete', $params);
    }

    /**
     * 
     * @return array [id,name,visible]
     */
    public function getFolders() {
        return parent::call('bot.folder.list_folders');
    }

    /**
     * 
     * @param int $folderId
     * @param int $userId
     * @return void
     */
    public function aclAllowUser($folderId, $userId) {
        $params = [
            'folder_id' => intval($folderId),
            'user_id' => intval($userId),
        ];
        return parent::call('bot.folder.acl.allow_user', $params);
    }

    /**
     * 
     * @param int $folderId
     * @param int $userId
     * @return void
     */
    public function aclRevokeUser($folderId, $userId) {
        $params = [
            'folder_id' => intval($folderId),
            'user_id' => intval($userId),
        ];
        return parent::call('bot.folder.acl.revoke_user', $params);
    }

    /**
     * 
     * @param int $folderId
     * @return int[]
     */
    public function aclGetUsersByFolder($folderId) {
        $params = [
            'folder_id' => intval($folderId),
        ];
        return parent::call('bot.folder.acl.users_by_folder', $params);
    }

    /**
     * 
     * @param int $userId
     * @return int[]
     */
    public function aclFoldersByUser($userId) {
        $params = [
            'user_id' => intval($userId),
        ];
        return parent::call('bot.folder.acl.folders_by_user', $params);
    }

    /**
     * 
     * @param string $peer
     * @param int $folderId
     * @return int[]
     */
    public function linkPeerToFolder($peer, $folderId) {
        $params = [
            'customer' => strval($peer),
            'folder_id' => intval($folderId),
        ];
        return parent::call('bot.folder.peer.link', $params);
    }

    /**
     * 
     * @param string $peer
     * @param int $folderId
     * @return int[]
     */
    public function unlinkPeerFromFolder($peer, $folderId) {
        $params = [
            'customer' => strval($peer),
            'folder_id' => intval($folderId),
        ];
        return parent::call('bot.folder.peer.unlink', $params);
    }

    /**
     * 
     * @param string $peer
     * @return int[]
     */
    public function getPeerLinkedFolders($peer) {
        $params = [
            'customer' => strval($peer),
        ];
        return parent::call('bot.folder.peer.get_linked_folders', $params);
    }

}
