<!-- 个人信息 start -->
<div class="am-modal am-modal-no-btn" tabindex="-1" id="profile-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">修改信息
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form id="user-profile-form" class="am-form am-form-horizontal data-am-validator">
                <div class="am-form-group">
                    <label for="user-nickname" class="am-u-sm-3 am-form-label">显示名</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="user-nickname" pattern="^\S+$" placeholder="显示名" value="{{Session::get('user.user-nickname')}}" />
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-mobile" class="am-u-sm-3 am-form-label">电话</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="user-mobile" required pattern="^\d+$" placeholder="电话" value="{{Session::get('user.user-mobile')}}" />
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-email" class="am-u-sm-3 am-form-label">电子邮箱</label>
                    <div class="am-u-sm-9">
                        <input type="email" id="user-email" required class="js-pattern-email" placeholder="电子邮箱" value="{{Session::get('user.email')}}" />
                    </div>
                </div>
                <div class="am-form-group">
                    <div class="am-u-sm-3 am-u-sm-offset-3">
                        <input type="submit" class="am-btn am-btn-default" value="提交修改" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 个人信息 end -->
<!-- 密码 start -->
<div class="am-modal am-modal-no-btn" tabindex="-1" id="password-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">修改密码
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form id="user-password-form" class="am-form am-form-horizontal data-am-validator">
                <div class="am-form-group">
                    <label for="user-old-password" class="am-u-sm-3 am-form-label">旧密码</label>
                    <div class="am-u-sm-9">
                        <input type="password" required id="user-old-password" placeholder="旧密码">
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-password" class="am-u-sm-3 am-form-label">新密码</label>
                    <div class="am-u-sm-9">
                        <input type="password" required id="user-password" placeholder="新密码">
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-password-confirmation" class="am-u-sm-3 am-form-label">确认密码</label>
                    <div class="am-u-sm-9">
                        <input type="password" required id="user-password-confirmation" data-equal-to="password" placeholder="确认密码">
                    </div>
                </div>
                <div class="am-form-group">
                    <div class="am-u-sm-3 am-u-sm-offset-3">
                        <input type="submit" class="am-btn am-btn-default" value="提交修改" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 密码 end -->

<script type="text/javascript">
$(function() {
    $('#user-profile-form').submit(function() {
        var data = {
            nickname: $('#user-nickname').val(),
            email: $('#user-email').val(),
            mobile: $('#user-mobile').val(),
        }

        $.ajax({
            url: '/admin/session/profile',
            method: 'PUT',
            data: data,
            success: function() {
                
            },
            error: function() {
                alert('遇到了什么错误, 请稍后再试');
            }
        });

        return false;
    });
});
</script>