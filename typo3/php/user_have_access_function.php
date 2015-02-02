<?php
//FONCTION AIDE MÉMOIRE

    /**
     * check if the current user can access the current page
     * @return boolean true if the user can access the page
     */
    private function currentUserCanAccessPage() {
        $haveAccess = false;
        $usergroups = explode(",", $GLOBALS['TSFE']->fe_user->user['usergroup']);
        $pageid = intval($GLOBALS['TSFE']->id);
        // Instanciation de la classe pageSelect
        $temp_sys_page = t3lib_div::makeInstance('t3lib_pageSelect');
        // Renvoie un tableau contenant la rootline de la page ayant pour id $this->id
        $rootline = $temp_sys_page->getRootLine($pageid);

        //Vérifie les groupes en respectant le rootline
        $pagegroups = "";
        foreach($rootline as $pageInRootLine) {
            if ($pageInRootLine['fe_group']) {
                if (!$pagegroups || ($pagegroups && $pageInRootLine['extendToSubpages'])) {
                    $pagegroups .= $pageInRootLine['fe_group'];
                }
            }
        }

        //Vérifie que un des groupe
        $pagegroups = explode(",", $pagegroups);
        foreach($usergroups as $usergroup) {
            if (in_array(intval($usergroup), $pagegroups)) {
                $haveAccess = true;
                break;
            }
        }

        return $haveAccess;
    }

?>
