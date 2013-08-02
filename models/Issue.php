<?php

class Issue
{
    /**
     * Function creates new issue and returns its id
     *
     * @param $issueData = array(
     *       parentId       = integer,
     *       issueTypeId    = integer,
     *       issueStatusId  = integer,
     *       assigneeUserId = integer,
     *       authorUserId   = integer,
     *       title          = string,
     *       description    = string,
     *       percentDone    = integer,
     * );
     *
     * @return int, id of issue on success, 0 on failure
     */
    public static function create($issueData)
    {
        $issueData += array(
            'parentId'       => null,
            'assigneeUserId' => null,
            'description'    => '',
            'percentDone'    => 0,
        );

        $db = new DB();
        $result = $db->execute("
                INSERT INTO issue
                SET
                    parentId       = :parentId,
                    issueTypeId    = :issueTypeId,
                    issueStatusId  = :issueStatusId,
                    assigneeUserId = :assigneeUserId,
                    authorUserId   = :authorUserId,
                    title          = :title,
                    description    = :description,
                    createdOn      = NOW(),
                    updatedOn      = NOW(),
                    percentDone    = :percentDone
            ",
            array(
                ':parentId'       => $issueData['parentId'],
                ':issueTypeId'    => $issueData['issueTypeId'],
                ':issueStatusId'  => $issueData['issueStatusId'],
                ':assigneeUserId' => $issueData['assigneeUserId'],
                ':authorUserId'   => $issueData['authorUserId'],
                ':title'          => $issueData['title'],
                ':description'    => $issueData['description'],
                ':percentDone'    => $issueData['percentDone'],
            )
        );

        return $db->lastInsertId();
    }

    /**
     * Function updates issue by issueId
     *
     * @param $issueData = array(
     *       issueId        = integer,
     *       parentId       = integer,
     *       issueTypeId    = integer,
     *       issueStatusId  = integer,
     *       assigneeUserId = integer,
     *       authorUserId   = integer,
     *       title          = string,
     *       description    = string,
     *       percentDone    = integer,
     * );
     *
     * @return boolean, true if update issue is success, 0 on failure
     */
    public static function update($issueData)
    {
        $issueData += array(
            'parentId'       => null,
            'assigneeUserId' => null,
            'description'    => '',
            'percentDone'    => 0,
        );

        $db = new DB();
        return (bool)$db->execute("
                UPDATE issue
                SET
                    parentId       = :parentId,
                    issueTypeId    = :issueTypeId,
                    issueStatusId  = :issueStatusId,
                    assigneeUserId = :assigneeUserId,
                    authorUserId   = :authorUserId,
                    title          = :title,
                    description    = :description,
                    createdOn      = NOW(),
                    updatedOn      = NOW(),
                    percentDone    = :percentDone
            ",
            array(
                ':parentId'       => $issueData['parentId'],
                ':issueTypeId'    => $issueData['issueTypeId'],
                ':issueStatusId'  => $issueData['issueStatusId'],
                ':assigneeUserId' => $issueData['assigneeUserId'],
                ':authorUserId'   => $issueData['authorUserId'],
                ':title'          => $issueData['title'],
                ':description'    => $issueData['description'],
                ':percentDone'    => $issueData['percentDone'],
            )
        );
    }

    /**
     * Function deletes issue by issueId
     *
     * @param $issueData = array(
     *       issueId       = integer,
     * );
     *
     * @return boolean, true if delete issue is success, 0 on failure
     */
    public static function delete($issueData)
    {
        $db = new DB();
        return (bool)$db->execute("
                DELETE FROM issue
                WHERE
                    issueId = :issueId
            ",
            array(
                ':issueId' => $issueData['issueId'],
            )
        );
    }

     /**
     * Function gets issue by issueId
     *
     * @param $issueData = array(
     *       issueId       = integer,
     * );
     *
     * @return array(
     *       issueId        = integer,
     *       parentId       = integer,
     *       issueTypeId    = integer,
     *       issueStatusId  = integer,
     *       assigneeUserId = integer,
     *       authorUserId   = integer,
     *       title          = string,
     *       description    = string,
     *       percentDone    = integer,
     *         )
     */
    public static function get($issueData)
    {
        $db = new DB();
        return $db->queryRow("
                SELECT * FROM issue
                WHERE
                    issueId = :issueId
            ",
            array(
                ':issueId' => $issueData['issueId'],
            )
        );
    }
}