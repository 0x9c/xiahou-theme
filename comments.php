<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<div class="comments post" id="comments">
    <?php
    $this->comments()->to($comments);
    //function threadedComments($comments, $options) {
//        echo 'hello 这是我的自定义评论';
//        $comments->content();
   // }
    ?>
    <?php if ($comments->have()): ?>
        <span class="widget-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论'));?></span>
        <?php $comments->listComments();?>
        <?php $comments->pageNav('&laquo; ', ' &raquo;', 50, '...', array('wrapTag' => 'nav', 'wrapClass' => 'pagination', 'itemTag' => '', 'prevClass' => 'extend prev', 'nextClass' => 'extend next', 'currentClass' => 'page-number current'));?>
    <?php endif;?>
    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId();?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply();?>
            </div>
            <span id="response" class="widget-title"><?php _e('添加新评论');?></span>
            <form method="post" action="<?php $this->commentUrl()?>" id="comment-form">
                <?php if ($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份：');?><a href="<?php $this->options->profileUrl();?>"><?php $this->user->screenName();?></a>. <a href="<?php $this->options->logoutUrl();?>" title="Logout"><?php _e('退出');?> &raquo;</a></p>
                <?php else: ?>
                    <p class="comment-about">
                        <label for="author" class="required"><?php _e('称呼');?></label>
                        <input type="text" name="author" id="author" class="text" value="<?php $this->remember('author');?>"/>
                    </p>
                    <p class="comment-about">
                        <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif;?>><?php _e('邮箱');?></label>
                        <input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail');?>"/>
                    </p>
                    <p class="comment-about">
                        <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif;?>><?php _e('网站');?></label>
                        <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://example.com');?>" value="<?php $this->remember('url');?>"/>
                    </p>
                <?php endif;?>
                <textarea rows="8" cols="50" name="text" class="text-area"><?php $this->remember('text');?></textarea>
                <div class="col2">
                    <button type="submit" class="submit"><?php _e('提交评论');?></button>
                </div>
            </form>
        </div>
    <?php else: ?>
    <?php endif;?>
</div>