<?php
/*
UserPermission_class.php - relates users to files
Copyright (C) 2002-2004 Stephen Lawrence Jr., Khoa Nguyen
Copyright (C) 2005-2011 Stephen Lawrence Jr.
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

if( !defined('UserPermission_class') )
{
    define('UserPermission_class', 'true', false);

    class UserPermission extends databaseData
    {
        var $connection;
        var $uid;
        var $user_obj;
        var $user_perms_obj;
        var $dept_perms_obj;
        var $FORBIDDEN_RIGHT;
        var $NONE_RIGHT;
        var $VIEW_RIGHT;
        var $READ_RIGHT;
        var $WRITE_RIGHT;
        var $ADMIN_RIGHT;

        /**
         * @param int $uid
         * @param PDO $connection
         */
        function UserPermission($uid, PDO $connection)
        {
            $this->uid = $uid;
            $this->connection = $connection;
            $this->user_obj = new User($this->uid, $this->connection);
            $this->user_perms_obj = new User_Perms($this->user_obj->getId(), $connection);
            $this->dept_perms_obj = new Dept_Perms($this->user_obj->getDeptId(), $connection);
            $this->FORBIDDEN_RIGHT = $this->user_perms_obj->FORBIDDEN_RIGHT;
            $this->NONE_RIGHT = $this->user_perms_obj->NONE_RIGHT;
            $this->VIEW_RIGHT = $this->user_perms_obj->VIEW_RIGHT;
            $this->READ_RIGHT = $this->user_perms_obj->READ_RIGHT;
            $this->WRITE_RIGHT = $this->user_perms_obj->WRITE_RIGHT;
            $this->ADMIN_RIGHT = $this->user_perms_obj->ADMIN_RIGHT;
        }

        /**
         * return an array of all the Allowed files ( right >= view_right) ID
         * @param bool $limit
         * @return array
         */
        function getAllowedFileIds($limit)
        {
            $viewable_array = $this->getViewableFileIds($limit);
            $readable_array = $this->getReadableFileIds($limit);
            $writeable_array = $this->getWriteableFileIds($limit);
            $adminable_array = $this->getAdminableFileIds($limit);
            $result_array = array_values( array_unique( array_merge($viewable_array, $readable_array, $writeable_array, $adminable_array) ) );
            return $result_array;
        }

        /**
         * return an array of all the Allowed files ( right >= view_right) object
         * @param bool $limit
         * @return array
         */
        function getAllowedFileOBJs($limit = true)
        {
            return $this->convertToFileDataOBJ( $this->getAllowedFileIds($limit) );
        }

        /**
         * @param bool $limit
         * @return array
         */
        function getViewableFileIds($limit = true)
        {
            //These 2 below takes half of the execution time for this function
            $user_perms_file_array = ($this->user_perms_obj->getCurrentViewOnly($limit));
            $dept_perms_file_array = ($this->dept_perms_obj->getCurrentViewOnly($limit));

            $query = "
              SELECT
                up.fid
              FROM
                {$GLOBALS['CONFIG']['db_prefix']}$this->TABLE_DATA d,
                {$GLOBALS['CONFIG']['db_prefix']}$this->TABLE_USER_PERMS up
              WHERE
                (
                  up.uid = :uid
				  AND d.id = up.fid
				  AND up.rights < :view_right
				  AND d.publishable = 1
				  )
            ";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(array(
                ':uid' => $this->uid,
                ':view_right' => $this->VIEW_RIGHT
            ));
            $array = $stmt->fetchAll();

            $dept_perms_file_array = array_diff($dept_perms_file_array, $array);
            $dept_perms_file_array = array_diff($dept_perms_file_array, $user_perms_file_array);
            $total_listing = array_merge($user_perms_file_array , $dept_perms_file_array);
            //$total_listing = array_unique( $total_listing);
            //$result_array = array_values($total_listing);
            return $total_listing;
        }

        /**
         * return an array of all the Allowed files ( right >= view_right) OBJ
         * @param bool $limit
         * @return array
         */
        function getViewableFileOBJs($limit = true)
        {
            return $this->convertToFileDataOBJ($this->getViewableFileIds($limit));
        }

        /**
         * return an array of all the Allowed files ( right >= read_right) ID
         * @param bool $limit
         * @return array
         */
        function getReadableFileIds($limit = true)
        {
            $user_perms_file_array = $this->user_perms_obj->getCurrentReadRight($limit);
            $dept_perms_file_array = $this->dept_perms_obj->getCurrentReadRight($limit);
            $published_file_array = $this->user_obj->getPublishedData(1);
            $result_array = array_values( array_unique( array_merge($published_file_array, $user_perms_file_array, $dept_perms_file_array) ) );
            return $result_array;
        }

        /**
         * return an array of all the Allowed files ( right >= read_right) OBJ
         * @param bool $limit
         * @return array
         */
        function getReadableFileOBJs($limit = true)
        {
            return $this->convertToFileDataOBJ($this->getReadableFileIds($limit));
        }

        /**
         * return an array of all the Allowed files ( right >= write_right) ID
         * @param bool $limit
         * @return array
         */
        function getWriteableFileIds($limit = true)
        {
            $user_perms_file_array = $this->user_perms_obj->getCurrentWriteRight($limit);
            $dept_perms_file_array = $this->dept_perms_obj->getCurrentWriteRight($limit);
            $published_file_array = $this->user_obj->getPublishedData(1);
            $result_array = array_values( array_unique( array_merge($published_file_array, $user_perms_file_array, $dept_perms_file_array) ) );
            return $result_array;
        }

        /**
         * return an array of all the Allowed files ( right >= write_right) ID
         * @param bool $limit
         * @return array
         */
        function getWriteableFileOBJs($limit = true)
        {
            return $this->convertToFileDataOBJ($this->getWriteableFileIds($limit));
        }

        /**
         * return an array of all the Allowed files ( right >= admin_right) ID
         * @param bool $limit
         * @return array
         */
        function getAdminableFileIds($limit = true)
        {
            $user_perms_file_array = $this->user_perms_obj->getCurrentAdminRight($limit);
            $dept_perms_file_array = $this->dept_perms_obj->getCurrentAdminRight($limit);
            $published_file_array = $this->user_obj->getPublishedData(1);
            $result_array = array_values( array_unique( array_merge($published_file_array, $user_perms_file_array, $dept_perms_file_array) ) );
            return $result_array;
        }

        /**
         * return an array of all the Allowed files ( right >= admin_right) OBJ
         * @param bool $limit
         * @return array
         */
        function getAdminableFileOBJs($limit = true)
        {
            return $this->convertToFileDataOBJ($this->getAdminableFileIds($limit));
        }

        /**
         * Combine a high priority array with a low priority array
         * @param array $high_priority_array
         * @param array $low_priority_array
         * @return array
         */
        function combineArrays($high_priority_array, $low_priority_array)
        {
            return databaseData::combineArrays($high_priority_array, $low_priority_array);
        }

        /**
         * getAuthority
         * Return the authority that this user have on file data_id
         * by combining and prioritizing user and department right
         * @param int $data_id
         * @return int
         */
        function getAuthority($data_id)
        {
            $data_id = (int) $data_id;
            $fileData = new FileData($data_id, $this->connection);

            if ($this->user_obj->isAdmin() || $this->user_obj->isReviewerForFile($data_id)) {
                return $this->ADMIN_RIGHT;
            }

            if ($fileData->isOwner($this->uid) && $fileData->isLocked()) {
                return $this->WRITE_RIGHT;
            }

            $user_permissions = $this->user_perms_obj->getPermission($data_id);
            $department_permissions = $this->dept_perms_obj->getPermission($data_id);

            if ($user_permissions >= $this->user_perms_obj->NONE_RIGHT and $user_permissions <= $this->user_perms_obj->ADMIN_RIGHT) {
                return $user_permissions;
            } else {
                return $department_permissions;
            }
        }

    }

}