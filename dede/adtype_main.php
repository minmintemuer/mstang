<?php
/**
 * ������������
 *
 */
require_once(dirname(__FILE__)."/config.php");
if(empty($dopost)) $dopost = '';

//�������
if($dopost=="save")
{
    $startID = 1;
    $endID = $idend;
    for(;$startID<=$endID;$startID++)
    {
        $query = '';
        $tid = ${'ID_'.$startID};
        $pname =   ${'pname_'.$startID};
        if(isset(${'check_'.$startID}))
        {
            if($pname!='')
            {
                $query = "UPDATE `#@__myadtypee` SET typename='$pname' WHERE id='$tid' ";
                $dsql->ExecuteNoneQuery($query);
            }
        }
        else
        {
            $query = "DELETE FROM `#@__myadtype` WHERE id='$tid' ";
            $dsql->ExecuteNoneQuery($query);
        }
    }
    //�����¼�¼
    if(isset($check_new) && $pname_new!='')
    {
        $query = "INSERT INTO `#@__myadtype`(typename) VALUES('{$pname_new}');";
        $dsql->ExecuteNoneQuery($query);
    }
    header("Content-Type: text/html; charset={$cfg_soft_lang}");
    ShowMsg("�ɹ����¹������б�", 'adtype_main.php');
    exit;
}

include DedeInclude('templets/adtype_main.htm');