<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }

    if ($ci->session->userdata('role') == 1) {
        redirect('auth/goToDefaultPage');
    }
}

function admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }

    if ($ci->session->userdata('role') == 2) {
        redirect('auth/goToDefaultPage');
    }
}

function activ($title, $submenu)
{
    if ($title == $submenu) {
        echo 'nav-item active';
    } else {
        echo 'nav-item';
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
