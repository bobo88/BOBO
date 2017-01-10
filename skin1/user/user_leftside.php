<aside class="user-sidebar fl">
    <ul>
        <li class="user-center-li"><a href="/m-user-center.html" class="user-center"><i class="user-icon icon-mycenter"></i>个人中心</a></li>
        <?php 
            if($userLeftBarNum === 1){
        ?>
            <li><a href="/my-profile.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-myprofile"></i>我的资料</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/my-profile.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-myprofile"></i>我的资料</span></a></li>
        <?php 
            }
        ?>

        <?php 
            if($userLeftBarNum === 2){
        ?>
            <li><a href="/m-article-publish.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-marticle"></i>文章管理</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/m-article-publish.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-marticle"></i>文章管理</span></a></li>
        <?php 
            }
        ?>

        <?php 
            if($userLeftBarNum === 3){
        ?>
            <li><a href="/m-home.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mindex"></i>首页管理</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/m-home.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mindex"></i>首页管理</span></a></li>
        <?php 
            }
        ?>

        <?php 
            if($userLeftBarNum === 4){
        ?>
            <li><a href="/m-ref-book.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mbooklist"></i>参考书籍管理</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/m-ref-book.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mbooklist"></i>参考书籍管理</span></a></li>
        <?php 
            }
        ?>

        <?php 
            if($userLeftBarNum === 5){
        ?>
            <li><a href="/m-wei-topic.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mwei"></i>微话题管理</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/m-wei-topic.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mwei"></i>微话题管理</span></a></li>
        <?php 
            }
        ?>

        <?php 
            if($userLeftBarNum === 6){
        ?>
            <li><a href="/m-demo-case.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mdemo"></i>演示案例</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/m-demo-case.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mdemo"></i>演示案例</span></a></li>
        <?php 
            }
        ?>

        <?php 
            if($userLeftBarNum === 7){
        ?>
            <li><a href="/m-about-me.html" class="current"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mabout"></i>关于我</span></a></li>
        <?php 
            }else{
        ?>
            <li><a href="/m-about-me.html"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-mabout"></i>关于我</span></a></li>
        <?php 
            }
        ?>

        <!-- <li class="no-user-rights"><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>关于我</span></a></li> -->
    </ul>
</aside>     