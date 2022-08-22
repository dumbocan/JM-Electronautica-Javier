<?php

require_once 'models/section.php';

class sectionController
{
    public function index()
    {
        Utils::isAdmin();
        $mat = new section();
        $sec = $mat->showsection();
        require_once 'views/section/section_register.php';
    }

    public function new_section()
    {
        Utils::isAdmin();
        require_once 'views/section/new_section.php';
    }

    public function save_section()
    {
        Utils::isAdmin();
        $section = $_POST['new_section'];

        $mat = new section();
        $mat->setsection_name($section);
        $save = $mat->save_section();
        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/section/section_ok.php';
    }

    public function edit_section()
    {
        Utils::isAdmin();
        $id = $_POST['section_id'];
        $name = $_POST['section_name'];
        require_once 'views/section/section_update.php';
    }

    public function update_section()
    {
        $id = $_POST['section_id'];
        $name = $_POST['section_name'];
        $section = new section();
        $section->setsection_name($name);
        $section->setsection_id($id);
        $save = $section->edit_section($id);

        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/section/section_ok.php';
    }

    public function ask_delete()
    {
        Utils::isAdmin();

        $name = $_POST['section_name'];
        $id = $_POST['section_id'];
        require_once 'views/section/section_delete.php';
    }

    public function delete_section()
    {
        $id = $_POST['section_id'];
        $section = new section();
        $section->setsection_id($id);
        $delete = $section->delete_section($id);
        if ($delete) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }
        require_once 'views/section/section_ok.php';
    }
}
