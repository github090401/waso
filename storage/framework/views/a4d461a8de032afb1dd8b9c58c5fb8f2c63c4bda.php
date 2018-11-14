<div class="JJList">
    <ul class="maxUl" id="app">
        <?php echo Form::open(['route'=>'admin.we_chat_application_managements.createAppChart','method'=>'post','id'=>'we_chat_application_managements','onsubmit'=>'return false']); ?>

        <li>
            <div class="liLeft">群聊名：</div>
            <div class="liRight">
                <?php echo Form::hidden('agentId',$we_chat_application_management->agentId,old('agentId'),['placeholder'=>'agentId',"class"=>'checkNull']); ?>

                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="群聊名" class="checkNull">
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">群主：</div>
            <div class="liRight">
                <?php echo Form::select('owner',$admins,old('owner'),['placeholder'=>'请选择群主',"class"=>'checkNull select2']); ?>

            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">群聊成员</div>
            <div class="liRight">
                <?php echo Form::select('userlist[]',$admins,old('userlist[]'),["class"=>'checkNull select2','multiple']); ?>

            </div>
            <div class="clear"></div>
        </li>

        <div class="clear"></div>
        <?php echo Form::close(); ?>

    </ul>
</div>


