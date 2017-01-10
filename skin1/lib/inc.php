<?php

/**
 * 显示一个提示信息
 *
 * @access  public
 * @param   string  $content
 * @param   string  $link
 * @param   string  $href
 * @param   string  $type               信息类型：warning, error, info
 * @return  void
 */
function show_message($content, $links = '', $hrefs = '', $type = 'info', $auto_redirect = false)
{
    $msg = array(
                'content'  => '验证码不正确',
                'back_url' => '/my-profile.html',
                'status'   => 'warning',    
    );
    header('Location: http://yuanbo.com/BOBO/temp/skin1/msg.php?msg='.$msg['content'].'&back_url='.$msg['back_url'].'&status='.$msg['status']);
}

?>